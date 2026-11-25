<script>
    // JS hanya untuk tampilan & mengambil data referensi (GET).
    // Pengiriman form (POST) ditangani PreRegisterController.
    document.addEventListener("DOMContentLoaded", () => {
        const API_BASE = @json(config('app.base_url_api'));
        const form = document.getElementById("preRegisterForm");

        async function fetchData(path) {
            const res = await fetch(`${API_BASE}/${path}`, {
                headers: {
                    Accept: "application/json"
                }
            });
            if (!res.ok) throw new Error(`HTTP ${res.status} (${path})`);
            return (await res.json()).data || [];
        }

        // Data dari API selalu di-escape sebelum masuk ke innerHTML
        function esc(value) {
            const el = document.createElement("div");
            el.textContent = value ?? "";
            return el.innerHTML.replace(/"/g, "&quot;");
        }

        const formatRp = (n) => "Rp " + Number(n || 0).toLocaleString("id-ID");

        /* ---------- Dropdown wilayah ---------- */
        const wilayah = [{
                id: "provinsi",
                path: () => "provinsi",
                pilih: "Pilih Provinsi",
                tunggu: ""
            },
            {
                id: "kota",
                path: (id) => `kota-kabupaten?provinsi_id=${id}`,
                pilih: "Pilih Kabupaten/Kota",
                tunggu: "Pilih Provinsi dahulu"
            },
            {
                id: "kecamatan",
                path: (id) => `kecamatan?kota_kabupaten_id=${id}`,
                pilih: "Pilih Kecamatan",
                tunggu: "Pilih Kota/Kabupaten dahulu"
            },
            {
                id: "kelurahan",
                path: (id) => `kelurahan?kecamatan_id=${id}`,
                pilih: "Pilih Kelurahan/Desa",
                tunggu: "Pilih Kecamatan dahulu"
            },
        ].map((w) => ({
            ...w,
            el: document.getElementById(w.id)
        }));

        function resetSelect(select, placeholder) {
            select.replaceChildren(new Option(placeholder, ""));
            select.disabled = true;
        }

        async function loadWilayah(index, parentId) {
            const {
                el,
                path,
                pilih
            } = wilayah[index];
            resetSelect(el, "Memuat...");

            // Abaikan respons lama jika pilihan induk sudah berganti
            const requestId = (el.requestId || 0) + 1;
            el.requestId = requestId;

            try {
                const items = await fetchData(path(encodeURIComponent(parentId)));
                if (el.requestId !== requestId) return;

                el.replaceChildren(new Option(pilih, ""), ...items.map((i) => new Option(i.nama, i.id)));
                el.disabled = items.length === 0;

                // Kembalikan pilihan sebelumnya setelah validasi gagal
                const old = el.dataset.old;
                delete el.dataset.old;
                if (old && items.some((i) => String(i.id) === old)) {
                    el.value = old;
                    el.dispatchEvent(new Event("change"));
                }
            } catch (err) {
                if (el.requestId !== requestId) return;
                resetSelect(el, "Gagal memuat data");
                console.error(err);
            }
        }

        wilayah.forEach(({
            el
        }, index) => {
            el.addEventListener("change", () => {
                wilayah.slice(index + 1).forEach((child) => {
                    child.el.requestId = (child.el.requestId || 0) + 1;
                    resetSelect(child.el, child.tunggu);
                });
                if (el.value && wilayah[index + 1]) loadWilayah(index + 1, el.value);
            });
        });

        loadWilayah(0);

        /* ---------- Paket layanan ---------- */
        const planGrid = document.getElementById("planGrid");
        const BUSINESS = ["business", "bisnis", "corporate", "korporat", "usaha", "kantor"];
        const isBusiness = (item) => BUSINESS.includes(String(item.segmen ?? item.kategori ?? "").trim()
            .toLowerCase());

        const ACTIVE_CARD = ["bg-surface-container-low", "ring-2", "ring-primary", "shadow-md"];
        const IDLE_CARD = ["bg-surface-container-lowest", "shadow-sm"];

        function showPlanMessage(message, color = "text-on-surface-variant") {
            planGrid.innerHTML = `<div class="md:col-span-2 text-center py-space-lg ${color}">${message}</div>`;
        }

        function updateSummary(item) {
            const set = (key, value) => form.querySelector(`[data-summary="${key}"]`).textContent = value;
            const biaya = ["harga", "ppn", "bhp_uso", "pph_23"];

            set("nama", item.nama);
            set("mbps", `${item.mbps} Mbps`);
            biaya.forEach((key) => set(key, formatRp(item[key])));
            set("total", formatRp(biaya.reduce((sum, key) => sum + Number(item[key] || 0), 0)));
        }

        function highlightPlan(card, active) {
            card.classList.remove(...ACTIVE_CARD, ...IDLE_CARD);
            card.classList.add(...(active ? ACTIVE_CARD : IDLE_CARD));

            const indicator = card.querySelector("[data-indicator]");
            indicator.classList.toggle("bg-primary", active);
            indicator.classList.toggle("bg-surface-container", !active);
            indicator.innerHTML = active ?
                '<span class="material-symbols-outlined text-[14px]">check</span>' : "";
        }

        function renderPlanCard(item) {
            const fitur = (item.fitur || []).map((f) => `
                <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                    ${esc(f)}
                </li>`).join("");

            const card = document.createElement("label");
            card.className =
                "relative rounded-xl p-space-md cursor-pointer transition-all flex flex-col justify-between hover:shadow-md focus-within:outline focus-within:outline-2 focus-within:outline-primary";
            card.innerHTML = `
                ${item.is_populer
                    ? '<div class="absolute -top-3 right-4 bg-primary text-on-primary px-space-sm py-0.5 rounded-full font-label-md text-label-md font-bold uppercase tracking-wider shadow-sm">Paling Populer</div>'
                    : ""}
                <input class="sr-only" name="paket" type="radio" value="${esc(item.id)}" required />
                <div>
                    <div class="flex justify-between items-start mb-space-xs">
                        <span class="font-label-md text-label-md text-primary font-semibold uppercase">${esc(item.kategori ?? item.nama)}</span>
                        <span class="w-5 h-5 rounded-full flex items-center justify-center text-on-primary" data-indicator></span>
                    </div>
                    <div class="flex items-baseline gap-1 mb-space-xs">
                        <span class="font-metric-stat text-metric-stat text-primary font-extrabold">${esc(item.mbps)}</span>
                        <span class="font-title-sm text-title-sm text-primary font-bold">Mbps</span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-space-md">${esc(item.deskripsi)}</p>
                    <ul class="space-y-1.5 font-body-md text-body-md text-on-surface-variant mb-space-md">${fitur}</ul>
                </div>
                <div class="pt-space-xs border-t border-surface-container flex items-baseline justify-between">
                    <span class="font-title-sm text-title-sm text-primary font-bold">${formatRp(item.harga)}</span>
                    <span class="font-label-md text-label-md text-outline">/ bulan (Netto)</span>
                </div>`;

            return card;
        }

        async function loadPlans() {
            try {
                const all = await fetchData("layanan");
                // Halaman retail: tampilkan paket retail, kecuali memang hanya ada paket bisnis
                const retail = all.filter((item) => !isBusiness(item));
                const items = retail.length ? retail : all;

                if (!items.length) return showPlanMessage("Belum ada paket tersedia.");

                const selected = items.find((i) => String(i.id) === planGrid.dataset.old) ||
                    items.find((i) => i.is_populer) ||
                    items[0];
                const cards = items.map(renderPlanCard);
                planGrid.replaceChildren(...cards);

                function selectPlan(index) {
                    cards.forEach((card, i) => highlightPlan(card, i === index));
                    updateSummary(items[index]);
                }

                cards.forEach((card, index) => {
                    card.querySelector("input").addEventListener("change", () => selectPlan(index));
                });

                const selectedIndex = items.indexOf(selected);
                cards[selectedIndex].querySelector("input").checked = true;
                selectPlan(selectedIndex);
            } catch (err) {
                showPlanMessage("Gagal memuat paket layanan. Muat ulang halaman.", "text-error");
                console.error(err);
            }
        }

        loadPlans();

        /* ---------- Upload foto ---------- */
        form.querySelectorAll("[data-upload]").forEach((box) => {
            const input = box.querySelector('input[type="file"]');
            const placeholder = box.querySelector("[data-upload-placeholder]");
            const success = box.querySelector("[data-upload-success]");

            input.addEventListener("change", () => {
                let file = input.files[0];
                let error = null;

                if (file && !["image/jpeg", "image/png"].includes(file.type)) {
                    error = "Format file harus JPG, JPEG, atau PNG.";
                } else if (file && file.size > 5 * 1024 * 1024) {
                    error = "Ukuran file maksimal 5 MB.";
                }

                if (error) {
                    showAlert({
                        type: "warning",
                        title: "File Tidak Sesuai",
                        message: error
                    });
                    input.value = "";
                    file = null;
                }

                box.querySelector("[data-upload-name]").textContent = file?.name ?? "";
                placeholder.classList.toggle("hidden", !!file);
                success.classList.toggle("hidden", !file);
                success.classList.toggle("flex", !!file);
            });
        });

        /* ---------- Status tombol saat mengirim ---------- */
        const button = document.getElementById("btnSubmitPreRegister");

        function setSubmitting(submitting) {
            button.disabled = submitting;
            button.querySelector("[data-submit-text]").textContent = submitting ? "Mengirim..." :
                "Kirim Pengajuan";
            const icon = button.querySelector("[data-submit-icon]");
            icon.textContent = submitting ? "progress_activity" : "send";
            icon.classList.toggle("animate-spin", submitting);
        }

        form.addEventListener("submit", () => setSubmitting(true));
        // Pulihkan tombol bila halaman dibuka lagi lewat tombol "Back"
        window.addEventListener("pageshow", () => setSubmitting(false));

        /* ---------- Hasil pengiriman dari server ---------- */
        @if (session('success'))
            showAlert({
                type: "success",
                title: "Pendaftaran Berhasil",
                message: @json(session('success')),
            });
        @elseif (session('error'))
            showAlert({
                type: "error",
                title: "Pendaftaran Gagal",
                message: @json(session('error')),
            });
        @endif
    });
</script>
