## Langkah-langkah Deploy Website Laravel

### Persiapan Hosting
- Login Layanan Hosting
- Pilih Buat Website
- Lewati pembuatan website secara otomatis
- Akses dashboard web hosting (HPanel)

### Persiapan Project Laravel
- Siapkan project laravel
- Jalankan ``` npm run build ``` jika ada package javascript didalam project
- Compress project dalam bentuk ``` .zip ```
- Upload file ```.zip``` ke File Manager tempatkan di folder ``` public_html ```

### Persiapan Database
- Akses database di lokal komputer
- Export database dengan format ```.sql```
- Akses phpMyAdmin pada HPanel, buat database baru
- Kelola database
- Import database yang sudah di export sebelumnya

### Setup Project pada HPanel
- Pilih file ``` .zip ``` yang sudah diupload lalu Ekstrak atau Buka Arsip
- Ketik ``` / ``` pada bagian pilih nama folder
- Buka folder yang telah diekstrak (cth: starter-praktikum-hosting)
- Select All or ```Ctrl + A```, klik move atau pindahkan file klik 2x pada pemilihan folder pastikan dipindahkan pada folder ```public_html```, klik pindahkan
- Hapus folder kosong yang isinya telah dipindahkan (cth: starter-praktikum-hosting)
- Hapus file  ```.zip``` dari project yang di upload
- Update file ```.env``` pada bagian berikut:
```json
APP_ENV=production
APP_DEBUG=false
APP_URL=[domain anda]

DB_DATABASE=[nama database anda]
DB_USERNAME=[username database anda]
DB_PASSWORD=[password database anda]
```
- Buat file ```.htaccess``` dengan isi sebagai berikut:
```json
<IfModule mod_rewrite.c>
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_URI} !^/public/ 

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ /public/$1 
#RewriteRule ^ index.php [L]
RewriteRule ^(/)?$ public/index.php [L] 
</IfModule>
```
