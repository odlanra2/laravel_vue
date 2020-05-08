const toggleWithoutAnimation = state => state.app.sidebar.withoutAnimation
const config = state => state.app.config
const palette = state => state.app.config.palette
const isLoading = state => state.app.isLoading
const token = state => state.login.token

export {
  toggleWithoutAnimation,
  config,
  palette,
  isLoading,
  token
}
