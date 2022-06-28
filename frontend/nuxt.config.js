export default {
  target: 'server',
  ssr: true,
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Home | Custom Project',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1, shrink-to-fit=no' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      // { rel: 'icon', type: 'image/x-icon', href: '/favicon.png' },
    ],
    script: [
      {
        src: 'https://use.fontawesome.com/3af70af034.js',
        src: 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',
        // src: 'https://unpkg.com/aos@2.3.1/dist/aos.js',
      }
    ]
  },
  env: {
    company: process.env.company,
  },
  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    // 'vue-slick-carousel/dist/vue-slick-carousel.css',
    // 'vue-slick-carousel/dist/vue-slick-carousel-theme.css',
    // '~/assets/sass/main.scss'
    // 'https://unpkg.com/aos@2.3.1/dist/aos.css',
    './assets/css/style.css',
    'vue-slick-carousel/dist/vue-slick-carousel.css',
    'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '~/plugins/slick.js',
    { src: '~/plugins/socket.client.js', mode: 'client', ssr: false, }
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    'bootstrap-vue/nuxt',
    '@nuxtjs/axios',
  ],
  bootstrapVue: {
    // icons: false
  },
  axios: {
    baseURL: process.env.baseURL, //'https://walrus-app-i9xq5.ondigitalocean.app/api/front/',
    // baseURL: 'http://localhost:8000/api/front/'
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    extractCSS: true,
    // analyze: true,
    babel: {
      compact: true,
    },
  },
  serverMiddleware: [
    '~/serverMiddleware/redirects'
  ],
}
