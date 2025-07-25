// ** UseJWT import to get config
import useJwt from '@src/auth/jwt/useJwt'
import {API} from "../../../utility/Utils"

const config = useJwt.jwtConfig

// ** Handle User Login
export const handleLogin = data => {
  return dispatch => {
    dispatch({
      type: 'LOGIN',
      data,
      config,
      [config.storageTokenKeyName]: data[config.storageTokenKeyName],
      [config.storageRefreshTokenKeyName]: data[config.storageRefreshTokenKeyName]
    })

    // ** Add to user, accessToken & refreshToken to localStorage
    localStorage.setItem('userData', JSON.stringify(data))
    localStorage.setItem(config.storageTokenKeyName, JSON.stringify(data.accessToken))
    localStorage.setItem(config.storageRefreshTokenKeyName, JSON.stringify(data.refreshToken))
  }
}

// ** Handle User Logout
export const handleLogout = () => {
  return dispatch => {
    dispatch({ type: 'LOGOUT', [config.storageTokenKeyName]: null, [config.storageRefreshTokenKeyName]: null })

    // ** Remove user, accessToken & refreshToken from localStorage
    localStorage.removeItem('userData')
    localStorage.removeItem(config.storageTokenKeyName)
    localStorage.removeItem(config.storageRefreshTokenKeyName)
  }
}

export const _getArticles = (callback) => {
  API.get('/Articles').then(callback)
}

export const _storeNewArticle = (data, callback, finalCallback) => {
  API.post(`/Articles`, data).then(callback).finally(finalCallback)
}

export const _getArticleDetails = (id, callback) => {
  API.get(`/Articles/${id}`).then(callback)
}

export const _storeNewComment = (data, callback, finalCallback) => {
  API.post(`/Comments`, data).then(callback).finally(finalCallback)
}
