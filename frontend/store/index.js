export const state = () => ({
    authtoken: '',
    loggedIn: false,
    loggedInUser: {},
    permissions: [],
    loader: false,
    currency: '£',
    username: '',
    allowedChat: false,
    messages: [],
    online: 0,
})
export const mutations = {
    setUserName(state, name){
        localStorage.setItem('obsession_username', name)
        state.username = name
        state.allowedChat = true
        let username = state.username
        // this.$socket.auth = { username };
        // this.$socket.connect();
        // this.$receiveMessage()
    },
    addMsg(state, object){
        state.messages.push(object)
        document.getElementsByClassName('chat-main')[0].children[1].scrollTop = document.getElementsByClassName('chat-main')[0].children[1].scrollHeight
    },
    prependMsg(state, obj){
        state.messages = [obj, ...state.messages]
    },
    updateOnlineCount(state, count){
        state.online = count
    },
    setAuthToken(state, authtoken) {
        localStorage.setItem('auth_token',authtoken);
        this.$axios.setHeader('Authorization', 'Bearer '+authtoken)
        state.authtoken = authtoken
    },
    setLoginStatus(state, loggedIn) {
        state.loggedIn = loggedIn
    },
    setloggedInUser(state, loggedInUser){
        localStorage.setItem('logged_in_role_id',loggedInUser.role_id);
        state.loggedInUser = loggedInUser
    },
    setPermissions(state, permissions){
        state.permissions = permissions
    },
    tglLoginloader(state){
        state.loader = !state.loader
    }
}
export const actions = {
    async setUserNameChatDefault({ commit }){
        let name = localStorage.getItem('obsession_username')
        if(name){
            commit('setUserName', name)
        }
    },
    async setUserNameChat({ commit }, { name }){
        if(name){
            commit('setUserName', name)
        }
    },
    async sendMessageSocket({commit, state}, {message, by}){
        commit('addMsg',{
            message: message,
            by: by,
        })
        this.$axios.post('sendshoutboxmsg',{
            username: by,
            message: message
        })
    },
    async addMessage({commit, state}, {message, by}){
        commit('addMsg',{
            message: message,
            by: by,
        })
    },
    async setOnlineCount({commit, state}, count){
        commit('updateOnlineCount',count)
    },
    async prependMessages({commit, state}, data){
        for(let i = 0; i < data.length; i++){
            commit('prependMsg',{
                message: data[i].message,
                by: data[i].name,
                time: data[i].created_date_formatted,
            })
        }
    },
    async tryLogin({ commit }, { email, password }) {
        commit('tglLoginloader')
        let res = await this.$axios.post('login', {
            email: email,
            password: password,
        }).then(async(logindetail)=>{
            if (logindetail.data) {
                if (logindetail.status) {
                    commit('setLoginStatus',true);
                    commit('setAuthToken',logindetail.data.token);
                    var user = await this.$axios.get('me').then(e=>e.data)
                    commit('setloggedInUser',user);
                    if(user.permissions.length>0){
                        let permissions = user.permissions.map((e)=>{
                            return e.permission_id
                        })
                        commit('setPermissions',permissions);
                    }
                    this.$router.push('/customer');
                } else {
                    // this.erorrs.email = logindetail.data;
                }
            }
        }).catch(async(errorDetails)=>{
            console.log(errorDetails)
        })
        commit('tglLoginloader')
    },
    async checkLogin({commit}){
        var token = localStorage.getItem('auth_token')?localStorage.getItem('auth_token'):'';
        if(token!=''){
            commit('setLoginStatus',true);
            commit('setAuthToken',token);
            var user = await this.$axios.get('me').then(e=>e.data)
            commit('setloggedInUser',user);
            if(user.permissions.length>0){
                let permissions = user.permissions.map((e)=>{
                    return e.permission_id
                })
                commit('setPermissions',permissions);
            }
        }
    },
}