# CRUD api lumen firebase database realtime

Stack use by this service is:
- Lumen
- Firebase database realtime

## Endpoint

GET /api/post

Mengambil data seluruh post

GET /api/post/:id

Mengambil data sesuai dengan id post


POST /api/post

Membuat post baru

Parameter body request:

```
{
    "title" => "Berita Hari ini"
    "content" => "Jabodetabek diprediksi hujan oleh bmkg"
    "author" => "Badrules"
}
```

PUT /api/post/:id

Mengupdate data post sesuai id


DELETE /api/post/:id

Menghapus data post