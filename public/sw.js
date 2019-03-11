importScripts("/service-worker/precache-manifest.2756e47b7aef4054526d08f3db6a1164.js", "https://storage.googleapis.com/workbox-cdn/releases/3.6.3/workbox-sw.js");

workbox.setConfig({
  debug: true
})

workbox.skipWaiting()
workbox.clientsClaim()

workbox.precaching.precacheAndRoute(self.__precacheManifest)

workbox.routing.registerRoute(
  new RegExp('.(?:jpg|jpeg|png|gif|svg|webp)$'),
  workbox.strategies.cacheFirst({
    cacheName: 'images',
    plugins: [
      new workbox.expiration.Plugin({
        maxEntries: 20,
        purgeOnQuotaError: true
      })
    ]
  })
)

workbox.routing.registerRoute(
  '/',
  workbox.strategies.staleWhileRevalidate({ cacheName: 'landing' })
)

workbox.routing.registerRoute(
  '/css/*',
  workbox.strategies.staleWhileRevalidate({ cacheName: 'css' })
)

workbox.routing.registerRoute(
  '/tasques',
  new workbox.strategies.NetworkFirst()
)

workbox.routing.registerRoute(
  '/home',
  new workbox.strategies.NetworkFirst()
)
