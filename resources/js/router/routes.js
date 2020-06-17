import ScoreBoard from '../components/ScoreBoard'
import Dashboard from '../components/admin/Dashboard'

export default [
    {
        path: '/',
        name: 'Score Board',
        component: ScoreBoard
    },
    {
        path: '/admin',
        name: 'Admin panel',
        component: Dashboard
    }
]
