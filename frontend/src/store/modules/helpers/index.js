export default {
    state:{
        drawer: false
    },
    getters:{
        getDrawer: state =>{
            return state.drawer;
        }
    },
    mutations:{
        SET_DRAWER(state, n){
            state.drawer = n;
        }
    }
}

