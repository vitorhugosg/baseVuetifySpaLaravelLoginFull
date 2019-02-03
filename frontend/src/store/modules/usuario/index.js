export default {
    state:{
        usuario: sessionStorage.getItem('usuario') ? JSON.parse(sessionStorage.getItem('usuario')) : null
    },
    getters:{
        getUsuario: state =>{
            return state.usuario;
        },
        getToken: state => {
            //pegando token
            if(state.usuario !== null){
                return state.usuario.token;
            }else{
                return false;
            }
        }
    },
    mutations:{
        SET_USUARIO(state, n){
            state.usuario = n;
            sessionStorage.setItem('usuario',JSON.stringify(state.usuario));
        }
    }
}

