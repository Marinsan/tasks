import moment from 'moment'

export default {
  /**
   * https://github.com/Minishlink/physbook/blob/02a0d5d7ca0d5d2cc6d308a3a9b81244c63b3f14/app/Resources/public/js/app.js#L177
   *
   * @param  {String} base64String
   * @return {Uint8Array}
   */
  urlBase64ToUint8Array (base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4)
    const base64 = (base64String + padding)
      .replace(/\-/g, '+')
      .replace(/_/g, '/')

    const rawData = window.atob(base64)
    const outputArray = new Uint8Array(rawData.length)

    for (let i = 0; i < rawData.length; ++i) {
      outputArray[i] = rawData.charCodeAt(i)
    }

    return outputArray
  },
  printObject (object) {
    let result = ''
    Object.keys(object).forEach(function (item) {
      result = item + ': ' + object[item]
    })
    return result
  },
  getCsrfToken () {
    console.log('getCsrfToken!')
    return window.axios.get('/csrftoken').then((response) => {
      console.log('returning response.data:')
      console.log(response.data)
      return Promise.resolve(response.data)
    }).catch((error) => {
      console.log('returning error')
      console.log(error)
      return Promise.reject(error)
    })
  },
  updateCsrfToken (token) {
    window.axios.defaults.headers['X-CSRF-TOKEN'] = token
    window.Laravel.csrfToken = token
    document.querySelector('meta[name=csrf-token]').setAttribute('content', token)
  },
  changeExtension (path, ext) {
    var pos = path.lastIndexOf('.')
    return path.substr(0, pos < 0 ? path.length : pos) + '.' + ext
  },
  async supportsWebp () {
    if (!self.createImageBitmap) return false

    const webpData = 'data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA='
    const blob = await fetch(webpData).then(r => r.blob())
    return createImageBitmap(blob).then(() => true, () => false)
  },
  validateDate (date) {
    return moment(date, 'YYYY-MM-DD', true).isValid()
  },
  formatDate (date, separator = '-') {
    if (!date) return null
    try {
      const [year, month, day] = date.split(separator)
      return `${day}${separator}${month}${separator}${year}`
    } catch (error) {
      return null
    }
  },
  unformatDate (date, separator = '-') {
    if (!date) return null
    try {
      const [day, month, year] = date.split(separator)
      return `${year}${separator}${month}${separator}${day}`
    } catch (error) {
      return null
    }
  },
  validateDNI (dni) {
    let numero, lt, letra
    let regexpdni = /^[XYZ]?\d{5,8}[A-Z]$/

    dni = dni.toUpperCase()

    if (regexpdni.test(dni) === true) {
      numero = dni.substr(0, dni.length - 1)
      numero = numero.replace('X', 0)
      numero = numero.replace('Y', 1)
      numero = numero.replace('Z', 2)
      lt = dni.substr(dni.length - 1, 1)
      numero = numero % 23
      letra = 'TRWAGMYFPDXBNJZSQVHLCKET'
      letra = letra.substring(numero, numero + 1)
      if (letra !== lt) return false
      else return true
    } else return false
  },
  is_empty (object) {
    return _.isEmpty(object)
  }
}
