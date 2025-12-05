// Animasi kecil untuk tombol
document.querySelectorAll(".btn, button").forEach(btn => {
    btn.addEventListener("mousedown", () => {
        btn.style.transform = "scale(0.95)";
    });
    btn.addEventListener("mouseup", () => {
        btn.style.transform = "scale(1)";
    });
});


/* =========================
   FILTERING TABLE
   ========================= */
const rows = document.querySelectorAll("#tabel-transaksi tr[data-jenis]");
let activeFilter = null;

const boxMasuk = document.getElementById("filter-masuk");
const boxKeluar = document.getElementById("filter-keluar");
const boxReset = document.getElementById("filter-reset");

function applyFilter(type) {
    rows.forEach(r => {
        r.style.display = (r.dataset.jenis === type ? "table-row" : "none");
    });
}

function resetFilter() {
    rows.forEach(r => r.style.display = "table-row");
}

function clearActiveBox() {
    [boxMasuk, boxKeluar, boxReset].forEach(b => b.classList.remove("active"));
}

/* --- Klik Pendapatan (MASUK) --- */
boxMasuk.addEventListener("click", () => {
    if (activeFilter === "masuk") {
        activeFilter = null;
        resetFilter();
        clearActiveBox();
    } else {
        activeFilter = "masuk";
        applyFilter("masuk");
        clearActiveBox();
        boxMasuk.classList.add("active");
    }
});

/* --- Klik Pengeluaran (KELUAR) --- */
boxKeluar.addEventListener("click", () => {
    if (activeFilter === "keluar") {
        activeFilter = null;
        resetFilter();
        clearActiveBox();
    } else {
        activeFilter = "keluar";
        applyFilter("keluar");
        clearActiveBox();
        boxKeluar.classList.add("active");
    }
});

/* --- Klik Total = Reset --- */
boxReset.addEventListener("click", () => {
    activeFilter = null;
    resetFilter();
    clearActiveBox();
    boxReset.classList.add("active");
});
