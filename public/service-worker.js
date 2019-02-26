workbox.skipWaiting()
workbox.clientsClaim()

workbox.precaching.precacheAndRoute(self.__precacheManifest)

workbox.routing.registerRoute(
  '/',
  workbox.strategies.staleWhileRevalidate({ cacheName: 'landing' })
)

workbox.routing.registerRoute(
  '/css/captures.css',
  '/css/Footer-with-button-logo.css',
  workbox.strategies.staleWhileRevalidate({ cacheName: 'landing' })
)