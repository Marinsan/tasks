import * as mutations from '../../mutation-types'
import * as actions from '../../action-types'
import users from '../../../api/users'
import auth from '../../../api/auth'

export default {
  [ actions.LOGGED_USER ] (context) {
    return new Promise((resolve, reject) => {
      users.fetch().then(response => {
        context.commit(mutations.LOGGED_USER, response.data)
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.CONFIRM_USER_EMAIL ] (context, user) {
    return new Promise((resolve, reject) => {
      auth.confirmUser(user).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.WELCOME_EMAIL ] (context, user) {
    return new Promise((resolve, reject) => {
      auth.welcome(user).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  }
}
