curl -i -X POST `
  https://graph.facebook.com/v25.0/100330039635650/messages `
  -H 'Authorization: Bearer EAAa0Nz4eIgIBRtX92z8ea7DUvhSNfwIv6ZBip9bB95oVpOnAhAiAUMJjqZBQyLhidqTiGSUEokIUTObejL0cODU3AIfIm80lhGy32CFzY5459WnmlIvHIQrQxK7YD3gfSdZAj2K2wgNyUKvW5WGXvX7f1xsTuU6UNJBtNSZBfjIlJ1sAKx18QpeON2pLD3khqNYAvc8SyoOEFXuCO7PxQa3xUSUblNOBKNDv5JtkO7MH2ZBLZCJgHPPXraL86yZAmZC0WAFmsjNIVTfd6IutxbHufVLZBYXJd0tUBVrzgOQZDZD' `
  -H 'Content-Type: application/json' `
  -d '{ \"messaging_product\": \"whatsapp\", \"to\": \"554195478268\", \"type\": \"template\", \"template\": { \"name\": \"hello_world\", \"language\": { \"code\": \"en_US\" } } }'