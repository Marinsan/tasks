(() => {
  'use strict'

  const AddToHomeScreen = {
    init () {
      self.addEventListener('fetch', function (event) {
         console.log('WORKER: fetch event in progress.')
        // PLEASE DO NOT REMOVE THIS FETCH HABDLER BECAUSE IS NEEDED FOR ADD TO HOME SCREEN
        // TODO -> OFFLINE

         console.log('Request -->', event.request.url)
        if (event.request.method != 'GET') return

        // To tell browser to evaluate the result of event
        // event.respondWith(
        //   caches.match(event.request) //To match current request with cached request it
        //     .then(function(response) {
        //       //If response found return it, else fetch again.
        //       return response || fetch(event.request);
        //     })
        //     .catch(function(error) {
        //       console.error("Error: ", error);
        //     })
      })
    }
  }

  // WebPush.init()
  AddToHomeScreen.init()
})()
