import * as actions from '../../../../store/action-types'
import store from '../../../../store'

export default {
  sendConfirmationEmail (user) {
    return store.dispatch(actions.CONFIRM_USER_EMAIL, user)
  },
  sendResetPasswordEmail (user) {
    return window.axios.post('password/email', { email: user.email })
  },
  sendWelcomeEmail (user) {
    return store.dispatch(actions.WELCOME_EMAIL, user)
  }
}