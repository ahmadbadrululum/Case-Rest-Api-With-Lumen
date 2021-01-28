# CRUD api lumen

Stack use by this service is:
- Lumen
- MongoDB

## Endpoint

GET /api/product

Mengambil data seluruh produk

GET /api/product/:id

Mengambil data sesuai dengan id produk


POST /api/product

Membuat produk baru

Parameter body request:

```
{
    "name": "Lenovo",
    "price": 10000,
    "category": "Electronic",
}
```

PUT /api/product/:id

Mengupdate data produk sesuai id


DELETE /api/product/:id

Menghapus data produk