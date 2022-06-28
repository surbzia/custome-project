import Vue from "vue";
import AgoraRTM from 'agora-rtm-sdk';
import AgoraRTC from 'agora-rtc-sdk-ng';
AgoraRTC.setLogLevel(4)
// AgoraRTM.setLogLevel(4)
import { io } from "socket.io-client";
Vue.use(AgoraRTM);
Vue.use(AgoraRTC);

const socket = io("https://obsessiondigitalradio.com/", { autoConnect: false, path: '/chat/socket.io' });
// import Vue from 'vue'
export default ({ $config, store }, inject) => {
    inject('AgoraRTM',AgoraRTM)
    inject('AgoraRTC',AgoraRTC)
    const receiveMessage = ()=>{
        socket.on("public_message", (data) => {
            store.dispatch('addMessage', data)
        });
        socket.on("users_count", (data) => {
            store.dispatch('setOnlineCount', data)
        });
        
    }
    inject('receiveMessage',receiveMessage)
    inject('socket',socket)
}