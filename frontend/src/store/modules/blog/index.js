import Axios from "axios";

export default {
    state:{
        posts:  null
    },
    getters:{
        getPosts: state =>{
            return state.posts;
        }
    },
    mutations:{
        SET_POSTS(state, n){
            state.posts = n;
        }
    },
    actions:{
        GET_POSTS({commit, context},payload){
            commit('SET_POSTS', 'loader');
            Axios.get(sessionStorage.getItem("urlAPI") + 'blog/get')
            .then(res =>{
                commit('SET_POSTS', res.data.data);
            });
        }
    }
}

