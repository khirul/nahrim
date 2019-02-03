import MainComponent from './components/MainComponent'
import StationComponent from './components/StationComponent'
import RoofComponent from './components/RoofComponent'
import WaterUsageComponent from './components/WaterUsageComponent'
import SimulatorComponent from './components/SimulatorComponent'
import GravityFedComponent from './components/GravityFedComponent'
import MenuComponent from './components/MenuComponent'
import RoofAreaComponent from './components/RoofAreaComponent.vue'
import RoofCatchmentComponent from './components/RoofCatchmentComponent.vue'
import GutterComponent from './components/GutterComponent'
import LeafGuardComponent from './components/LeafGuardComponent.vue'
import FirstFlushComponent from './components/FirstFlushComponent.vue'
import WaterDemandComponent from './components/WaterDemandComponent.vue'
import PumpingSystemComponent from './components/PumpingSystemComponent.vue'
import TopUpComponent from './components/TopUpComponent.vue'
import AverageComponent from './components/AverageComponent.vue'
import LandingPage01Component from './components/LandingPage01Component.vue'
import LandingPage02Component from './components/LandingPage02Component.vue'

export const routes = [{
    path: '/',
    name: 'root',
    component: MainComponent
},
{
    path: '/stations',
    name: 'station',
    component: StationComponent
},
{
    path: '/roof-characteristics',
    name: 'roof',
    component: RoofComponent
},
{
    path: '/water-usage',
    name: 'usage',
    component: WaterUsageComponent
},
{
    path: '/simulator',
    name: 'simulator',
    component: SimulatorComponent
},
{
    path: '/average',
    name: 'average',
    component: AverageComponent
},
{
    path: '/landing/01',
    name: 'landing01',
    component: LandingPage01Component
},
{
    path: '/landing/02',
    name: 'landing02',
    component: LandingPage02Component
},
{
    path: '/gravity-fed',
    name: 'gravity-fed',
    component: GravityFedComponent,

    children: [{
        path: '/',
        name: 'roof-area',
        component: RoofAreaComponent,
    },
    {
        path: '/gravity-fed/catchment',
        name: 'catchment',
        component: RoofCatchmentComponent,
    },
    {
        path: '/gravity-fed/gutter',
        name: 'gutter',
        component: GutterComponent,
    },
    {
        path: '/gravity-fed/leaf-guard',
        name: 'leaf-guard',
        component: LeafGuardComponent,
    },
    {
        path: '/gravity-fed/first-flush',
        name: 'first-flush',
        component: FirstFlushComponent,
    },
    {
        path: '/gravity-fed/water-demand',
        name: 'water-demand',
        component: WaterDemandComponent,
    },
    {
        path: '/gravity-fed/pumping-system',
        name: 'pump',
        component: PumpingSystemComponent,
    },
    {
        path: '/gravity-fed/top-up',
        name: 'top-up',
        component: TopUpComponent,
    }
    ]
},
{
    path: '/menu',
    name: 'menu',
    component: MenuComponent
}
]
