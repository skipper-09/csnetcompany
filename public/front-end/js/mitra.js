/* Program Mitra CSNET */
(function () {
    "use strict";

    // ===== Counter textarea =====
    document.querySelectorAll("[data-counter]").forEach((el) => {
        const out = el.closest(".mtr-field")?.querySelector(".mtr-counter");
        if (!out) return;
        const update = () =>
            (out.textContent = `${el.value.length}/${el.maxLength}`);
        el.addEventListener("input", update);
        update();
    });

    // ===== Provinsi & Kota =====
    const prov = document.querySelector('[data-wilayah="province"]');
    const city = document.querySelector('[data-wilayah="city"]');

    if (prov && city) {
        const API = "https://www.emsifa.com/api-wilayah-indonesia/api";

        const fill = (select, items, oldVal) => {
            items.forEach((item) => {
                const opt = new Option(
                    item.name,
                    item.name,
                    false,
                    item.name === oldVal,
                );
                opt.dataset.id = item.id;
                select.add(opt);
            });
        };

        const loadCities = async (provId, oldVal = "") => {
            city.length = 1;
            city.disabled = true;
            if (!provId) return;
            const res = await fetch(`${API}/regencies/${provId}.json`);
            fill(city, await res.json(), oldVal);
            city.disabled = false;
        };

        (async () => {
            try {
                const res = await fetch(`${API}/provinces.json`);
                fill(prov, await res.json(), prov.dataset.old);
                const selected = prov.selectedOptions[0];
                if (selected?.dataset.id)
                    await loadCities(selected.dataset.id, city.dataset.old);
            } catch (e) {
                console.error("Gagal memuat data wilayah", e);
            }
        })();

        prov.addEventListener("change", () =>
            loadCities(prov.selectedOptions[0]?.dataset.id),
        );
    }

    // ===== Kategori & Sub Kategori =====
    const main = document.querySelector("[data-categories]");
    const sub = document.querySelector("[data-subcategory]");

    if (main && sub) {
        const categories = JSON.parse(main.dataset.categories);

        const fillSub = (oldVal = "") => {
            sub.length = 1;
            (categories[main.value] || []).forEach((s) =>
                sub.add(new Option(s, s, false, s === oldVal)),
            );
            sub.disabled = !main.value;
        };

        main.addEventListener("change", () => fillSub());
        fillSub(sub.dataset.old);
    }

    // ===== Upload dokumen =====
    document
        .querySelectorAll('.mtr-doc input[type="file"]')
        .forEach((input) => {
            input.addEventListener("change", () => {
                const out = input
                    .closest(".mtr-doc")
                    .querySelector(".mtr-doc__file");
                const file = input.files[0];
                if (!file) return;

                const maxMb = Number(input.dataset.max || 5);

                if (file.type !== "application/pdf") {
                    alert("File harus berformat PDF.");
                    input.value = "";
                    return;
                }
                if (file.size > maxMb * 1024 * 1024) {
                    alert(`Ukuran file maksimal ${maxMb} MB.`);
                    input.value = "";
                    return;
                }

                out.textContent = `${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                out.className = "mtr-doc__file is-selected";
            });
        });

    // ===== Cegah double submit =====
    document.querySelectorAll("form[data-lock-submit]").forEach((form) => {
        form.addEventListener("submit", () => {
            const btn = form.querySelector('[type="submit"]');
            if (!btn) return;
            btn.disabled = true;
            btn.dataset.text = btn.innerHTML;
            btn.innerHTML = "Mengirim...";
        });
    });
})();
