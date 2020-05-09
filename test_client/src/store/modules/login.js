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
     
     if (state.status!=='loading'){
     	 return new Promise((resolve, reject)=> {
            commit('AUTH_REQUEST', user.email)
            TestServices.post('login', user).then(res=>{
            	 if (res.data.session) {
                     
                     const token = res.data.session
                     localStorage.setItem('user-token', JSON.stringify(token))
                     localStorage.setItem('user-user', JSON.stringify(res.data.user))

                     TestServices.setToken(token);

                     commit('AUTH_SUCCESS', token)
             
                     resolve(res)

               }else {
                commit('AUTH_ERROR', user.user)
                localStorage.removeItem('user-token')
                localStorage.removeItem('user-user')
                localStorage.removeItem('id_session')
                 reject(user.user)
               }

            	
            })
     	 });
     }
   

   },
  'AUTH_LOGOUT': ({ commit, dispatch }) => {
       //console.log('salir');
       commit('AUTH_LOGOUT')
       localStorage.removeItem('user-token')
       localStorage.removeItem('user-user')
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
    console.log(state);
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