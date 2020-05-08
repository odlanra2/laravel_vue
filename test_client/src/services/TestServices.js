import RestService from './RestServices'
const TestService = {}
TestService.setToken = (token) => {
  RestService.defaults.headers['Authorization'] = token
}

TestService.get = function (endpoint) {
  return RestService.get(endpoint)
    .then(res => {
      
      return res.data
    }).catch(err => {
      console.log(err)
      console.log('Error TEST API')

      if (err.response && err.response.status === 403) {
        location.reload()
      }
    })
}

TestService.post = function (endpoint, json) {
  return RestService.post(endpoint, json)
    .then(res => res.data)
    .catch(err => {
      console.log(err)
      console.log('Error to send')
      if (err.response && err.response.status === 403) {
        location.reload()
      }
    })
}

TestService.put = function (endpoint, json) {
  return RestService.put(endpoint, json)
    .then(res => res.data)
    .catch(err => {
      console.log(err)
      console.log('Error to update')
      if (err.response && err.response.status === 403) {
        location.reload()
      }
    })
}


TestService.delete = function (endpoint) {
  return RestService.delete(endpoint)
    .then(res => {
      // console.log(res);
      if (res.status === 200) {
        console.log('200')
      }
      return res.data
    }).catch(err => {
      console.log(err)
      console.log('Error al Eliminar')
      if (err.response && err.response.status === 403) {
        location.reload()
      }
    })
}


export default TestService