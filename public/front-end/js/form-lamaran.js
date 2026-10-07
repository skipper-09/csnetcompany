(function () {
    const modal = document.getElementById("krrFormModal");
    if (!modal) return;

    const form = document.getElementById("krrFormLamaran");
    const body = form.querySelector(".krr-form__body");
    const steps = [
        ...form.querySelectorAll(
            '.krr-step[data-step]:not([data-step="success"])',
        ),
    ];
    const successStep = form.querySelector('[data-step="success"]');
    const TOTAL = steps.length;
    const NEXT_LABELS = {
        1: "Pendidikan",
        2: "Pengalaman",
        3: "Dokumen",
        4: "Review",
    };
    const MAX_FILE = 5 * 1024 * 1024;

    let current = 1;
    let currentSlug = null;
    let isSuccess = false;
    let counter = 0;

    const q = (s, c = form) => c.querySelector(s);
    const qa = (s, c = form) => [...c.querySelectorAll(s)];
    const val = (name) => (form.elements[name]?.value ?? "").trim();
    const esc = (s) =>
        String(s ?? "").replace(
            /[&<>"']/g,
            (c) =>
                ({
                    "&": "&amp;",
                    "<": "&lt;",
                    ">": "&gt;",
                    '"': "&quot;",
                    "'": "&#39;",
                })[c],
        );

    // ===================== MODAL =====================
    function open(slug, judul) {
        if (slug !== currentSlug || isSuccess) {
            reset();
            currentSlug = slug;
        }
        form.elements["lowongan_slug"].value = slug;
        q("[data-posisi]").textContent = judul;

        modal.classList.add("is-open");
        modal.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
    }

    function close() {
        modal.classList.remove("is-open");
        modal.setAttribute("aria-hidden", "true");
        document.body.style.overflow = "";
    }

    function reset() {
        form.reset();
        isSuccess = false;
        qa("[data-list]").forEach((list) => (list.innerHTML = ""));
        addRow("pengalaman");
        qa("[data-file-name]").forEach(
            (el) => (el.textContent = "Tidak ada file dipilih"),
        );
        qa("[data-file-clear]").forEach((el) => (el.hidden = true));
        qa(".krr-error").forEach((el) => el.remove());
        qa(".is-invalid").forEach((el) => el.classList.remove("is-invalid"));
        q("[data-form-alert]").hidden = true;
        togglePengalaman();
        successStep.classList.remove("is-active");
        qa("[data-hide-on-success]").forEach((el) => (el.hidden = false));
        showStep(1);
    }

    // ===================== STEP =====================
    function showStep(n) {
        current = n;
        steps.forEach((s, i) => s.classList.toggle("is-active", i + 1 === n));

        qa("[data-step-nav]").forEach((li) => {
            const no = +li.dataset.stepNav;
            li.classList.toggle("is-active", no === n);
            li.classList.toggle("is-done", no < n);
            li.querySelector(".krr-stepper__dot").innerHTML =
                no < n
                    ? '<svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>'
                    : no;
        });

        q("[data-prev]").textContent = n === 1 ? "Batal" : "Kembali";
        q("[data-next]").hidden = n === TOTAL;
        q("[data-submit]").hidden = n !== TOTAL;
        if (NEXT_LABELS[n]) q("[data-next-label]").textContent = NEXT_LABELS[n];

        if (n === TOTAL) buildReview();
        body.scrollTo({ top: 0, behavior: "smooth" });
    }

    // ===================== VALIDASI =====================
    function fieldWrap(el) {
        return el.closest(".krr-doc") || el.closest(".krr-field");
    }

    function clearError(el) {
        el.classList.remove("is-invalid");
        el.closest(".krr-phone")?.classList.remove("is-invalid");
        fieldWrap(el)
            ?.querySelectorAll(".krr-error")
            .forEach((e) => e.remove());
    }

    function setError(el, msg) {
        el.classList.add("is-invalid");
        el.closest(".krr-phone")?.classList.add("is-invalid");
        const wrap = fieldWrap(el);
        if (!wrap || wrap.querySelector(".krr-error")) return;
        const small = document.createElement("small");
        small.className = "krr-error";
        small.textContent = msg;
        wrap.appendChild(small);
    }

    function messageFor(el) {
        const v = el.validity;
        if (v.valueMissing)
            return el.type === "file"
                ? "Dokumen ini wajib diunggah."
                : el.type === "checkbox"
                  ? "Anda harus menyetujui pernyataan ini."
                  : "Wajib diisi.";
        if (v.typeMismatch && el.type === "email")
            return "Format email tidak valid.";
        if (v.typeMismatch && el.type === "url")
            return "Format URL tidak valid.";
        if (v.patternMismatch && el.name === "telepon")
            return "Nomor telepon tidak valid. Contoh: 812 3456 7890";
        return el.validationMessage;
    }

    function validateStep(n) {
        let first = null;
        const fields = qa("input, select, textarea", steps[n - 1]).filter(
            (el) => !el.disabled && el.type !== "hidden",
        );

        fields.forEach((el) => clearError(el));
        fields.forEach((el) => {
            let msg = el.checkValidity() ? "" : messageFor(el);

            if (!msg && el.type === "file" && el.files[0]) {
                if (el.files[0].size > MAX_FILE)
                    msg = "Ukuran file maksimal 5 MB.";
                else if (!/\.(pdf|docx?)$/i.test(el.files[0].name))
                    msg = "Format file harus PDF, DOC, atau DOCX.";
            }

            if (msg) {
                setError(el, msg);
                first ??= el;
            }
        });

        if (first) {
            first.scrollIntoView({ block: "center", behavior: "smooth" });
            if (first.type !== "file") first.focus({ preventScroll: true });
        }
        return !first;
    }

    // ===================== REPEATER =====================
    function addRow(type) {
        const tpl = document.getElementById(
            type === "pendidikan" ? "tplPendidikan" : "tplPengalaman",
        );
        const html = tpl.innerHTML.replaceAll("__i__", counter++);
        q(`[data-list="${type}"]`).insertAdjacentHTML("beforeend", html);
        updateRemoveButtons();
    }

    function updateRemoveButtons() {
        const rows = qa('[data-list="pengalaman"] .krr-repeat');
        rows.forEach(
            (r) =>
                (r.querySelector("[data-remove]").hidden = rows.length === 1),
        );
    }

    function togglePengalaman() {
        const punya = val("punya_pengalaman") === "1";
        const wrap = q("[data-pengalaman-wrap]");
        wrap.disabled = !punya;
        wrap.hidden = !punya;
        q("[data-fresh-note]").hidden = punya;
        // tetap jaga input "selesai" yang disable karena "masih bekerja"
        qa("[data-masih]").forEach(syncMasihBekerja);
    }

    function syncMasihBekerja(cb) {
        const selesai = cb
            .closest(".krr-repeat")
            .querySelector('[data-f="selesai"]');
        if (cb.checked) {
            selesai.value = "";
            selesai.disabled = true;
            clearError(selesai);
        } else if (!q("[data-pengalaman-wrap]").disabled) {
            selesai.disabled = false;
        }
    }

    // ===================== REVIEW =====================
    function selectText(name) {
        const el = form.elements[name];
        return el?.selectedIndex > 0 ? el.options[el.selectedIndex].text : "";
    }

    function formatTanggal(v) {
        if (!v) return "";
        return new Date(v + "T00:00:00").toLocaleDateString("id-ID", {
            day: "numeric",
            month: "long",
            year: "numeric",
        });
    }

    function formatBulan(v) {
        if (!v) return "";
        return new Date(v + "-01T00:00:00").toLocaleDateString("id-ID", {
            month: "short",
            year: "numeric",
        });
    }

    function section(title, step, content) {
        return `
            <div class="krr-review">
                <div class="krr-review__head">
                    <h5>${title}</h5>
                    <button type="button" data-goto="${step}">Ubah</button>
                </div>
                ${content}
            </div>`;
    }

    function buildReview() {
        const rowsInfo = [
            ["Nama Lengkap", val("nama_lengkap")],
            ["Email", val("email")],
            ["No. Telepon", "+62 " + val("telepon").replace(/^0/, "")],
            [
                "Tempat, Tgl Lahir",
                `${val("tempat_lahir")}, ${formatTanggal(val("tanggal_lahir"))}`,
            ],
            [
                "Jenis Kelamin",
                val("jenis_kelamin") === "L" ? "Laki-laki" : "Perempuan",
            ],
            ["Domisili", val("domisili")],
        ];
        if (val("linkedin_url"))
            rowsInfo.push(["LinkedIn", val("linkedin_url")]);

        const pribadi = `<dl class="krr-review__grid">${rowsInfo.map(([k, v]) => `<dt>${k}</dt><dd>${esc(v)}</dd>`).join("")}</dl>`;

        const tahun =
            val("tahun_masuk") || val("tahun_lulus")
                ? ` (${esc(val("tahun_masuk") || "?")} - ${esc(val("tahun_lulus") || "?")})`
                : "";
        let pendidikan = `<p class="krr-review__text"><strong>${esc(selectText("pendidikan_terakhir"))} ${esc(val("jurusan"))}</strong><br>${esc(val("nama_institusi"))}${tahun}${val("ipk") ? `<br>IPK: ${esc(val("ipk"))}` : ""}</p>`;

        qa('[data-list="pendidikan"] .krr-repeat').forEach((r) => {
            const sel = r.querySelector('[data-f="jenjang"]');
            const jenjang =
                sel.selectedIndex > 0
                    ? sel.options[sel.selectedIndex].text
                    : "";
            const f = (k) => r.querySelector(`[data-f="${k}"]`).value.trim();
            pendidikan += `<p class="krr-review__text"><strong>${esc(jenjang)} ${esc(f("jurusan"))}</strong><br>${esc(f("nama_institusi"))}${f("tahun_lulus") ? ` (${esc(f("tahun_lulus"))})` : ""}</p>`;
        });

        let pengalaman =
            '<p class="krr-review__text">Tidak ada (fresh graduate)</p>';
        if (val("punya_pengalaman") === "1") {
            pengalaman = qa('[data-list="pengalaman"] .krr-repeat')
                .map((r) => {
                    const f = (k) =>
                        r.querySelector(`[data-f="${k}"]`).value.trim();
                    const masih = r.querySelector("[data-masih]").checked;
                    return `<p class="krr-review__text"><strong>${esc(f("posisi"))}</strong><br>${esc(f("nama_perusahaan"))} (${formatBulan(f("mulai"))} - ${masih ? "Sekarang" : formatBulan(f("selesai"))})</p>`;
                })
                .join("");
        }

        const docs = qa('input[type="file"]')
            .filter((el) => el.files[0])
            .map(
                (el) =>
                    `<li><strong>${esc(el.dataset.label)}:</strong> ${esc(el.files[0].name)}</li>`,
            )
            .join("");

        q("[data-review]").innerHTML =
            section("Data Pribadi", 1, pribadi) +
            section("Data Pendidikan", 2, pendidikan) +
            section("Pengalaman Kerja", 3, pengalaman) +
            section("Dokumen", 4, `<ul class="krr-review__docs">${docs}</ul>`);
    }

    // ===================== SUBMIT =====================
    function nameFromKey(key) {
        const [first, ...rest] = key.split(".");
        return first + rest.map((p) => `[${p}]`).join("");
    }

    function showServerErrors(errors) {
        let targetStep = TOTAL;
        const umum = [];

        qa(".krr-error").forEach((e) => e.remove());

        Object.entries(errors).forEach(([key, msgs]) => {
            const el = form.querySelector(
                `[name="${CSS.escape(nameFromKey(key))}"]`,
            );
            const stepEl = el?.closest(".krr-step");

            if (el && stepEl) {
                setError(el, msgs[0]);
                targetStep = Math.min(targetStep, +stepEl.dataset.step);
            } else {
                umum.push(msgs[0]);
            }
        });

        if (umum.length) {
            const alert = q("[data-form-alert]");
            alert.innerHTML = umum.map(esc).join("<br>");
            alert.hidden = false;
        }

        showStep(targetStep);
    }

    function showSuccess(data) {
        isSuccess = true;
        steps.forEach((s) => s.classList.remove("is-active"));
        qa("[data-hide-on-success]").forEach((el) => (el.hidden = true));
        q("[data-success-kode]").textContent = data.kode;
        q("[data-success-posisi]").textContent = data.posisi;
        successStep.classList.add("is-active");
        body.scrollTo({ top: 0 });
    }

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        if (!validateStep(TOTAL)) return;

        const btn = q("[data-submit]");
        const alert = q("[data-form-alert]");
        btn.disabled = true;
        btn.textContent = "Mengirim...";
        alert.hidden = true;

        try {
            const res = await fetch(form.action, {
                method: "POST",
                headers: {
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: new FormData(form),
            });
            const data = await res.json().catch(() => ({}));

            if (res.ok) {
                showSuccess(data);
            } else if (res.status === 422) {
                showServerErrors(data.errors || {});
            } else {
                alert.textContent =
                    res.status === 429
                        ? "Terlalu banyak pengiriman. Silakan coba lagi nanti."
                        : res.status === 419
                          ? "Sesi telah berakhir, silakan muat ulang halaman."
                          : "Terjadi kesalahan. Silakan coba lagi.";
                alert.hidden = false;
            }
        } catch (err) {
            alert.textContent =
                "Koneksi bermasalah. Periksa internet Anda dan coba lagi.";
            alert.hidden = false;
        } finally {
            btn.disabled = false;
            btn.textContent = "Kirim Lamaran";
        }
    });

    // ===================== EVENT =====================
    q("[data-next]").addEventListener("click", () => {
        if (validateStep(current)) showStep(current + 1);
    });

    q("[data-prev]").addEventListener("click", () => {
        current === 1 ? close() : showStep(current - 1);
    });

    form.addEventListener("click", (e) => {
        const nav = e.target.closest("[data-step-nav]");
        if (nav && +nav.dataset.stepNav < current)
            showStep(+nav.dataset.stepNav);

        const go = e.target.closest("[data-goto]");
        if (go) showStep(+go.dataset.goto);

        const add = e.target.closest("[data-add]");
        if (add) addRow(add.dataset.add);

        const remove = e.target.closest("[data-remove]");
        if (remove) {
            remove.closest(".krr-repeat").remove();
            updateRemoveButtons();
        }

        const clear = e.target.closest("[data-file-clear]");
        if (clear) {
            const doc = clear.closest(".krr-doc");
            doc.querySelector('input[type="file"]').value = "";
            doc.querySelector("[data-file-name]").textContent =
                "Tidak ada file dipilih";
            clear.hidden = true;
        }
    });

    form.addEventListener("change", (e) => {
        const el = e.target;

        if (el.name === "punya_pengalaman") togglePengalaman();
        if (el.matches("[data-masih]")) syncMasihBekerja(el);

        if (el.type === "file") {
            const doc = el.closest(".krr-doc");
            const file = el.files[0];
            doc.querySelector("[data-file-name]").textContent = file
                ? file.name
                : "Tidak ada file dipilih";
            doc.querySelector("[data-file-clear]").hidden = !file;
        }

        if (el.classList.contains("is-invalid") && el.checkValidity())
            clearError(el);
    });

    form.addEventListener("input", (e) => {
        if (
            e.target.classList.contains("is-invalid") &&
            e.target.checkValidity()
        )
            clearError(e.target);
    });

    document.addEventListener("click", (e) => {
        if (e.target.closest("[data-close-form]")) close();
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && modal.classList.contains("is-open")) close();
    });

    reset();
    window.KrrForm = { open, close };
})();
