import login from '@/pages/usuario/auth/login'
import registro from '@/pages/usuario/auth/registro'
import confirmaremail from '@/pages/usuario/auth/confirmaremail'
import esquecisenha from '@/pages/usuario/auth/esquecisenha'
import resetarsenha from '@/pages/usuario/auth/resetarsenha'
import minhaconta from '@/pages/usuario/auth/minhaconta'
export default [
    {
      path: '/login',
      name: 'Login',
      component: login
    },
    {
      path: '/registro',
      name: 'Registro',
      component: registro
    },
    {
      path: '/confirmaremail',
      name: 'Confirmar Email',
      component: confirmaremail
    },
    {
      path: '/esquecisenha',
      name: 'Esqueci Senha',
      component: esquecisenha
    },
    {
      path: '/resetarsenha/:token',
      name: 'Resetar Senha',
      component: resetarsenha
    },
    {
      path: '/minhaconta',
      name: 'Minha Conta',
      component: minhaconta
    }
]