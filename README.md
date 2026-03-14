# Alumni_pelacakan

# Sistem Pelacakan Alumni (MVP)

Proyek ini adalah implementasi Minimum Viable Product (MVP) dari rancangan Sistem Pelacakan Alumni pada Daily Project 2. Sistem ini dibangun menggunakan Framework Laravel untuk mendemonstrasikan antarmuka Admin Pelacak dan simulasi Mesin Ekstraksi Otonom.

## Fitur Utama
1. **Dasbor Admin Pelacak:** Menampilkan daftar target alumni beserta status pelacakannya.
2. **Simulasi Ekstraksi Otonom:** Menjalankan penarikan data (simulasi) dan memberikan skor probabilitas kemiripan profil secara otomatis.
3. **Jejak Bukti Audit:** Mengarsipkan riwayat pelacakan, sumber temuan (seperti portal akademik/LinkedIn), skor, dan tautan bukti.

## Tabel Pengujian Aplikasi
Berikut adalah pengujian aplikasi berdasarkan aspek kualitas (Fungsionalitas dan *Usability*) yang telah dirancang:

| ID | Skenario Pengujian | Aspek Kualitas | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| TC-01 | Menjalankan Orkestrasi Kueri (Klik "Lacak Sekarang") | *Functionality* | Sistem memproses data dan mengubah status awal "Belum Dilacak" menjadi status baru. | Sistem berhasil memproses dan memberikan notifikasi sukses. | **LULUS** |
| TC-02 | Resolusi Entitas dan Skoring (Skor $\ge 80\%$) | *Functionality* | Jika mesin memberikan skor 80% ke atas, status alumni otomatis terkunci menjadi "Teridentifikasi". | Status berubah menjadi "Teridentifikasi" (Valid). | **LULUS** |
| TC-03 | Resolusi Entitas dan Skoring (Skor $< 80\%$) | *Functionality* | Jika mesin memberikan skor di bawah 80%, status berubah menjadi "Perlu Verifikasi Manual". | Status berubah menjadi "Perlu Verifikasi Manual" (Cek Manual). | **LULUS** |
| TC-04 | Menyimpan Jejak Audit | *Functionality* | Setiap kali pelacakan dijalankan, data skor, jabatan, instansi, dan sumber temuan tersimpan di *database*. | Data riwayat bertambah dan tersimpan dengan benar di tabel `tracking_histories`. | **LULUS** |
| TC-05 | Mengakses Detail Riwayat Alumni | *Usability* | Admin dapat dengan mudah melihat riwayat pelacakan lengkap dari dasbor melalui tombol "Lihat Detail". | Halaman Jejak Audit berhasil terbuka dan menampilkan riwayat beserta cap waktu. | **LULUS** |

---
*Dibuat untuk memenuhi tugas Daily Project.*
