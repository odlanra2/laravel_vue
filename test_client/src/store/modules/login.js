import TestServices from '../../services/TestServices'

const state = {
  status: '',
  token: localStorage.getItem('user-token') || '',
  user: 'user'
}

const getters = {
  isAuthenticated: state => !!state.token, // pregunta si existe un token o es null
  authStatus: state => state.status,
}

const actions = {
  'AUTH_REQUEST': ({ commit, dispatch }, user) => {
     console.log('respuesta desde login:', user)
     if (state.status!=='loading'){
     	 return new Promise((resolve, reject)=> {
            TestServices.post('login', user).then(res=>{
            	console.log(res);
            })
     	 });
     }
   

   },
  'AUTH_LOGOUT': ({ commit, dispatch }) => {

  }
}


const mutations = {
  'AUTH_REQUEST': (state, email) => {
    console.log(email);
    state.status = 'loading'
    state.user = email
  },
  'AUTH_SUCCESS': (state, token) => {
    state.status = 'success'
    state.token = token
  },
  'AUTH_ERROR': (state) => {
    state.status = 'error'
    state.token = ''
    console.log('AUTH_ERROR mutations', state.status)
  },
  'AUTH_LOGOUT': (state) => {
    state.status = 'logout'
    state.token = ''
  },
}

export default {
  state,
  getters,
  mutations,
  actions,
}