# SIPAJAK — Sistem Informasi Pengelolaan Pajak Daerah

> **Digitalisasi pengelolaan pajak daerah dalam satu platform terintegrasi, fleksibel, dan dapat dikembangkan untuk berbagai jenis pajak.**

**SIPAJAK** (*Sistem Informasi Pengelolaan Pajak Daerah*) adalah aplikasi berbasis web yang dirancang untuk membantu lembaga pengelola pajak daerah dalam mengelola proses administrasi perpajakan secara **terpusat dan digital**.

Sistem mencakup proses mulai dari **pendaftaran wajib pajak, penerbitan NPWPD, pelaporan SPTPD, perhitungan pajak, pembayaran online, verifikasi, penerbitan dokumen digital, hingga monitoring penerimaan melalui dashboard manajemen**.

SIPAJAK dirancang dengan konsep **multi-jenis pajak**, sehingga sistem tidak terikat pada satu jenis pajak tertentu. Jenis pajak, tarif, formula perhitungan, periode, serta struktur formulir dapat dikonfigurasi melalui master data.

---

## Project Overview

| Informasi          | Detail                                    |
| ------------------ | ----------------------------------------- |
| **Nama**           | SIPAJAK                                   |
| **Kepanjangan**    | Sistem Informasi Pengelolaan Pajak Daerah |
| **Platform**       | Web Application                           |
| **Backend**        | Laravel 13                                |
| **Bahasa**         | PHP 8.3+                                  |
| **Database**       | MySQL / MariaDB                           |
| **Frontend**       | Blade + Livewire/Alpine.js                |
| **Payment**        | Midtrans / Xendit                         |
| **Authentication** | Laravel Sanctum / Breeze                  |
| **Authorization**  | Role-Based Access Control                 |
| **Queue**          | Laravel Queue                             |
| **Status**         | Development / Draft Project               |
| **Developer**      | Uroo Dev                                  |

---

## Latar Belakang

Pengelolaan pajak daerah melibatkan berbagai proses seperti pendaftaran wajib pajak, pelaporan, perhitungan, pembayaran, verifikasi, hingga rekapitulasi penerimaan.

Jika proses tersebut masih dilakukan secara manual atau semi-manual, beberapa permasalahan dapat muncul, seperti:

* Kesalahan dalam perhitungan pajak
* Keterlambatan pelaporan
* Kesulitan melakukan rekonsiliasi data
* Data tersebar di berbagai media
* Monitoring penerimaan kurang efektif
* Kurangnya transparansi bagi wajib pajak
* Kesulitan menambahkan jenis pajak baru

SIPAJAK dirancang sebagai solusi digital untuk mengintegrasikan proses tersebut dalam satu sistem.

---

## Tujuan Sistem

SIPAJAK memiliki beberapa tujuan utama:

* Menyediakan layanan pendaftaran wajib pajak secara online.
* Mendukung pengajuan dan penerbitan **NPWPD digital**.
* Memfasilitasi pelaporan **SPTPD** secara online.
* Mengotomatisasi perhitungan pajak berdasarkan tarif dan formula yang dikonfigurasi.
* Menyediakan pembayaran melalui **Virtual Account, QRIS, dan e-wallet**.
* Mempermudah proses verifikasi dan pemeriksaan laporan.
* Menghasilkan dokumen perpajakan digital yang dapat diverifikasi.
* Menyediakan dashboard penerimaan untuk kebutuhan monitoring.
* Meningkatkan kepatuhan melalui sistem notifikasi dan pengingat.
* Mendukung penambahan jenis pajak baru tanpa perlu membuat sistem baru.

---

# Fitur Utama

## 1. Multi-Jenis Pajak

Sistem dirancang untuk menangani berbagai jenis pajak daerah dalam satu platform.

Contoh implementasi:

* Pajak Hotel
* Pajak Restoran
* Pajak Hiburan
* Pajak Reklame
* Pajak Parkir
* Jenis pajak daerah lainnya

Setiap jenis pajak dapat memiliki:

* Tarif berbeda
* Formula perhitungan berbeda
* Struktur formulir berbeda
* Periode pajak berbeda
* Aturan denda berbeda
* Kategori objek pajak berbeda

Pendekatan ini membuat sistem lebih fleksibel ketika terdapat perubahan kebijakan atau penambahan jenis pajak.

---

## 2. Pendaftaran Wajib Pajak & NPWPD

Wajib pajak dapat melakukan pendaftaran secara online.

Data yang dapat dikelola meliputi:

* Data usaha
* Data penanggung jawab
* Data objek pajak
* Jenis pajak
* Dokumen legalitas
* KTP
* NPWP
* NIB / izin usaha
* Foto lokasi atau objek usaha

Setelah diverifikasi dan disetujui oleh petugas, sistem dapat menerbitkan **NPWPD digital dengan QR Code validasi**.

---

## 3. Pelaporan SPTPD Dinamis

SIPAJAK menggunakan konsep **dynamic form** untuk menyesuaikan formulir dengan jenis pajak.

Contohnya:

```text
Pajak Hotel
    ↓
Omzet / data objek hotel
    ↓
Tarif pajak
    ↓
Perhitungan otomatis
    ↓
Pajak terutang
```

Jenis pajak lain dapat menggunakan basis perhitungan yang berbeda, seperti:

* Omzet
* Luas media
* Volume
* Kapasitas
* Atribut objek pajak lainnya

Formula:

```text
Pajak Terutang = Dasar Pengenaan Pajak × Tarif
```

Wajib pajak juga dapat melihat riwayat pelaporan dan melakukan pembetulan sesuai aturan yang dikonfigurasi.

---

## 4. Pembayaran Online

Sistem dirancang untuk terintegrasi dengan payment gateway seperti:

* Midtrans
* Xendit

Metode pembayaran yang direncanakan:

* Virtual Account
* QRIS
* E-wallet

Alur pembayaran:

```text
SPTPD Submit
     ↓
Perhitungan Pajak
     ↓
Kode Tagihan
     ↓
Payment Gateway
     ↓
Pembayaran
     ↓
Webhook
     ↓
Status Lunas
     ↓
SSPD Digital
```

Status pembayaran diperbarui secara otomatis melalui **callback/webhook**, sehingga tidak membutuhkan input manual.

---

## 5. Verifikasi & Pemeriksaan

Petugas dapat melakukan pemeriksaan terhadap laporan wajib pajak.

Fitur meliputi:

* Daftar SPTPD masuk
* Status pemeriksaan
* Cross-check data
* Riwayat laporan
* Catatan pemeriksaan
* Pengajuan SKPDKB
* Pengajuan SKPDLB
* Approval berjenjang

Alur approval:

```text
Wajib Pajak
     ↓
SPTPD
     ↓
Verifikator
     ↓
Pemeriksaan
     ↓
SKPDKB / SKPDLB
     ↓
Kepala Bidang / Kepala Dinas
     ↓
Dokumen Resmi
```

Setiap proses pemeriksaan disimpan sebagai **audit trail**.

---

## 6. Dokumen Digital

Sistem menghasilkan dokumen perpajakan dalam format PDF.

Dokumen yang didukung:

* NPWPD
* SSPD
* SKPD
* SKPDKB
* SKPDLB

Setiap dokumen dilengkapi **QR Code / kode unik** untuk membantu proses validasi keaslian dokumen.

---

## 7. Notifikasi & Pengingat

Sistem menyediakan notifikasi otomatis untuk membantu meningkatkan kepatuhan wajib pajak.

Contoh pengingat:

```text
H-7  → Pengingat jatuh tempo
H-3  → Pengingat jatuh tempo
H-1  → Pengingat terakhir
```

Notifikasi juga digunakan untuk:

* Konfirmasi pelaporan
* Konfirmasi pembayaran
* Informasi pembayaran gagal
* Informasi pembayaran kedaluwarsa
* Pengingat tunggakan

Kanal utama:

* Email
* WhatsApp Gateway *(opsional / pengembangan lanjutan)*

---

## 8. Dashboard & Reporting

Dashboard memberikan gambaran kondisi penerimaan pajak secara terpusat.

Informasi yang dapat ditampilkan:

* Total penerimaan
* Penerimaan harian
* Penerimaan bulanan
* Penerimaan tahunan
* Penerimaan berdasarkan jenis pajak
* Target vs realisasi
* Jumlah wajib pajak aktif
* Tingkat kepatuhan
* Daftar tunggakan
* Nilai tunggakan

Laporan dapat difilter berdasarkan:

* Periode
* Jenis pajak
* Wilayah
* Status wajib pajak

Output laporan:

* Excel
* PDF

---

# User Roles

SIPAJAK menggunakan **Role-Based Access Control (RBAC)** untuk membatasi akses berdasarkan tanggung jawab pengguna.

| Role                             | Tanggung Jawab                                                        |
| -------------------------------- | --------------------------------------------------------------------- |
| **Wajib Pajak**                  | Pendaftaran, pelaporan SPTPD, pembayaran, melihat dokumen dan riwayat |
| **Admin / Petugas**              | Mengelola wajib pajak, master data, pelaporan dan notifikasi          |
| **Verifikator / Pemeriksa**      | Memeriksa laporan dan mengajukan surat ketetapan                      |
| **Kepala Bidang / Kepala Dinas** | Approval, monitoring penerimaan dan laporan manajemen                 |
| **Super Admin / IT**             | Pengelolaan pengguna, hak akses, konfigurasi dan audit log            |

---

# Business Flow

```text
┌──────────────────────┐
│ Registrasi Wajib     │
│ Pajak                 │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Verifikasi Admin     │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ NPWPD Digital        │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Pelaporan SPTPD      │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Perhitungan Pajak    │
│ Otomatis             │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Payment Gateway      │
│ VA / QRIS / E-Wallet │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Webhook Pembayaran   │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ SSPD Digital         │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Verifikasi / Audit   │
└──────────┬───────────┘
           ↓
┌──────────────────────┐
│ Dashboard Manajemen  │
└──────────────────────┘
```

---

# System Architecture

Secara konseptual, sistem menggunakan arsitektur web application dengan Laravel sebagai backend utama.

```text
                         ┌─────────────────┐
                         │     Browser     │
                         │ Desktop / Mobile│
                         └────────┬────────┘
                                  │
                                  ▼
                    ┌─────────────────────────┐
                    │      Laravel 13         │
                    │      Application        │
                    ├─────────────────────────┤
                    │ Authentication           │
                    │ RBAC                     │
                    │ Business Logic           │
                    │ Tax Calculation           │
                    │ Reporting                 │
                    │ Audit Trail               │
                    └───────┬─────────┬───────┘
                            │         │
                 ┌──────────▼───┐ ┌──▼──────────────┐
                 │ MySQL /      │ │ Laravel Queue   │
                 │ MariaDB      │ │ Redis/Database  │
                 └──────────────┘ └───────┬─────────┘
                                          │
                         ┌────────────────┼────────────────┐
                         │                │                │
                         ▼                ▼                ▼
                   Payment Gateway     Email         File Storage
                   Midtrans/Xendit     SMTP          Local/S3
```

---

# Technology Stack

### Backend

* **Laravel 13**
* **PHP 8.3+**

### Database

* **MySQL**
* MariaDB
* PostgreSQL *(alternatif)*

### Frontend

* Blade
* Livewire
* Alpine.js

### Payment

* Midtrans
* Xendit
* Virtual Account
* QRIS
* E-wallet

### Authentication & Authorization

* Laravel Sanctum / Breeze
* Role-Based Access Control
* Middleware authorization
* Two-Factor Authentication untuk akun internal

### Infrastructure

* Laravel Queue
* Redis / Database Queue
* Local Storage / S3-compatible Object Storage
* SMTP
* HTTPS / SSL

---

# Security

Karena sistem menangani data wajib pajak dan transaksi keuangan, aspek keamanan menjadi bagian penting dalam rancangan aplikasi.

Beberapa mekanisme keamanan yang direncanakan:

* HTTPS / SSL
* Enkripsi data sensitif
* Role-Based Access Control
* Two-Factor Authentication untuk akun internal
* Audit trail
* Login activity monitoring
* Pembatasan akses berdasarkan role
* Pencatatan perubahan data penting
* Backup database otomatis
* Disaster recovery

Target seluruh aktivitas penting memiliki informasi:

```text
User
  +
Action
  +
Timestamp
  +
Data Changed
```

---

# Performance & Scalability

SIPAJAK dirancang agar dapat dikembangkan seiring bertambahnya jumlah wajib pajak dan jenis pajak.

Target teknis:

* Response halaman dan transaksi umum < 3 detik pada kondisi jaringan normal.
* Proses berat menggunakan Laravel Queue.
* Arsitektur modular.
* Penambahan jenis pajak melalui konfigurasi.
* Tidak membutuhkan perubahan kode untuk setiap penambahan jenis pajak baru yang dapat direpresentasikan oleh konfigurasi sistem.
* Target availability minimal 99% di luar maintenance terjadwal.

---

# Project Scope

### Included

* Multi-jenis pajak
* Registrasi wajib pajak
* NPWPD digital
* SPTPD elektronik
* Dynamic tax form
* Automatic tax calculation
* Online payment
* Payment webhook
* SSPD digital
* Verifikasi dan pemeriksaan
* SKPD/SKPDKB/SKPDLB
* Notifikasi
* Dashboard
* Reporting
* RBAC
* Audit trail
* Master data

### Out of Scope — Initial Version

* Native Android / iOS application
* Integrasi langsung dengan SIPD/SIMDA
* Modul PBB-P2
* Modul BPHTB
* Proses keberatan/banding hukum formal

Fitur tersebut dapat dikembangkan sebagai bagian dari fase berikutnya.

---

# Development Roadmap

Pengembangan sistem dibagi menjadi beberapa fase.

### Phase 1 — Foundation & Registration

* Project setup
* Authentication
* RBAC
* Master Data
* Registrasi wajib pajak
* NPWPD

### Phase 2 — Reporting & Payment

* SPTPD
* Dynamic form
* Tax calculation
* Payment Gateway
* Webhook
* SSPD
* Email notification

### Phase 3 — Verification & Management

* Verification workflow
* Examination
* SKPDKB / SKPDLB
* Dashboard
* Management reporting
* Audit trail

### Phase 4 — Testing & Go-Live

* User Acceptance Test
* Bug fixing
* User training
* Data migration
* Production deployment
* Go-Live

---

# Acceptance Criteria

Sistem dinyatakan memenuhi kebutuhan utama apabila:

* Admin dapat menambahkan jenis pajak baru melalui Master Data.
* Tarif dan struktur SPTPD dapat dikonfigurasi.
* Wajib pajak dapat melakukan registrasi dan mengunggah dokumen.
* NPWPD digital dapat diterbitkan setelah proses verifikasi.
* Sistem dapat menghitung pajak sesuai tarif yang dikonfigurasi.
* Status pembayaran diperbarui melalui webhook.
* SSPD dan dokumen terkait dapat diterbitkan dalam PDF.
* Dokumen dapat diverifikasi menggunakan QR Code.
* Dashboard konsisten dengan data transaksi.
* Setiap role hanya dapat mengakses fitur yang diizinkan.
* Sistem dapat melewati proses User Acceptance Test (UAT).

---

# Why This Project Matters

SIPAJAK bukan hanya aplikasi CRUD untuk mengelola data pajak.

Proyek ini dirancang untuk menyelesaikan **end-to-end business process**:

```text
Registration
     ↓
Tax Identification
     ↓
Tax Reporting
     ↓
Automatic Calculation
     ↓
Digital Payment
     ↓
Verification
     ↓
Digital Documents
     ↓
Management Reporting
```

Pendekatan tersebut membuat sistem dapat digunakan sebagai **platform administrasi pajak daerah yang modular**, bukan aplikasi yang hanya menangani satu jenis pajak.

Konsep **configuration-driven tax system** juga memungkinkan perubahan tarif, formula, periode, dan struktur pelaporan dilakukan melalui master data sesuai kebutuhan lembaga.

---

# Project Highlights

Beberapa aspek teknis yang menjadi fokus proyek:

* **Multi-tenant jenis pajak**
* **Dynamic form**
* **Configurable tax calculation**
* **Payment Gateway integration**
* **Webhook-based payment confirmation**
* **Digital document generation**
* **QR Code document validation**
* **Role-Based Access Control**
* **Audit Trail**
* **Queue-based processing**
* **Management dashboard**
* **Modular architecture**
* **Scalable tax configuration**

---

# Developer

### Uroo Dev

**Uroo Dev** adalah software development project yang berfokus pada pengembangan solusi digital seperti:

* Web Application
* Information System
* Mobile Application
* UI/UX
* Digital Solutions

SIPAJAK merupakan salah satu project yang dirancang dengan pendekatan **business-oriented software development**, dengan fokus pada bagaimana teknologi dapat menyelesaikan proses bisnis nyata secara terstruktur.

---

# Project Documentation

Dokumentasi kebutuhan sistem tersedia dalam **Product Requirements Document (PRD)**:

```text
PRD-PAJAK-DAERAH-001
Version 1.0
29 August 2026
```

Dokumen PRD menjadi dasar dalam menentukan scope, functional requirements, non-functional requirements, acceptance criteria, roadmap, serta risiko pengembangan sistem.

---

# License

Project ini merupakan project pengembangan oleh **Uroo Dev**.

Hak penggunaan, distribusi, dan lisensi aplikasi mengikuti kesepakatan dengan pihak client.
