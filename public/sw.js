importScripts("/service-worker/precache-manifest.ec9a4ed6ebdfd4077dd9ca7b6b7be9c4.js", "https://storage.googleapis.com/workbox-cdn/releases/4.1.0/workbox-sw.js");

workbox.setConfig({
  debug: true
})

workbox.core.skipWaiting()
workbox.core.clientsClaim()

workbox.precaching.cleanupOutdatedCaches()

workbox.precaching.precacheAndRoute(self.__precacheManifest)

workbox.routing.registerRoute(
  new RegExp('.(?:jpg|jpeg|png|gif|svg|webp)$'),
  new workbox.strategies.CacheFirst({
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
  new workbox.strategies.StaleWhileRevalidate({ cacheName: 'landing' })
)

workbox.routing.registerRoute(
  '/css/*',
  new workbox.strategies.StaleWhileRevalidate({ cacheName: 'css' })
)

workbox.routing.registerRoute(
  '/tasques',
  new workbox.strategies.NetworkFirst()
)

workbox.routing.registerRoute(
  '/home',
  new workbox.strategies.NetworkFirst()
)

self.addEventListener('push', (event) => {
  const title = 'TODO CANVIAR TITOL'
  const options = {
    body: event.data.text()
  }
  event.waitUntil(self.registration.showNotification(title, options))
})

const showNotification = () => {
  self.registration.showNotification('Post Sent', {
    body: 'You are back online and your post was successfully sent!'
    // icon: 'assets/icon/256.png',
    // badge: 'assets/icon/32png.png'
  })
}

const bgSyncPlugin = new workbox.backgroundSync.Plugin('newsletter', {
  maxRetentionTime: 24 * 60, // Retry for max of 24 Hours
  callbacks: {
    queueDidReplay: showNotification
  }
})

workbox.routing.registerRoute(
  '/api/v1/newsletter',
  new workbox.strategies.NetworkOnly({
    plugins: [bgSyncPlugin]
  }),
  'POST'
)
