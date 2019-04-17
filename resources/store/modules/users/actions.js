import * as mutations from '../../mutation-types'
import * as actions from '../../action-types'
import users from '../../../api/users'

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
  }
}
