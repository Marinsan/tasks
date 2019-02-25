(() => {
  'use strict'

  const AddToHomeScreen = {
    init () {
      self.addEventListener('fetch', function (event) {

        // PLEASE DO NOT REMOVE THIS FETCH HABDLER BECAUSE IS NEEDED FOR ADD TO HOME SCREEN
        // TODO -> OFFLINE


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
