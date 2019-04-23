import axios from 'axios'

export default {
  login (credentials) {
    return axios.post('/login', credentials)
  },
  logout () {
    return axios.post('/logout')
  },
  register (user) {
    return axios.post('/register', {
      'name': user.name,
      'email': user.email,
      'password': user.password,
      'password_confirmation': user.password_confirmation
    })
  },
  remember (email) {
    return axios.post('/password/email', { 'email': email })
  },
  confirm () {
    return axios.get('/email/resend')
  },
  confirmUser (user) {
    return axios.get('/api/v1/email/resend/' + user.id)
  },
  welcome (user) {
    return axios.get('/api/v1/email/welcome/' + user.id)
  },
  reset (user) {
    return axios.post('/password/reset', {
      'email': user.email,
      'password': user.password,
      'password_confirmation': user.password_confirmation,
      'token': user.token,
      'options': user.options
    })
  }
}