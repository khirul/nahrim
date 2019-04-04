import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        url: 'http://nahrim.test',
        location: '',
        coefficient: '',
        area: '',
        areaShow: false,
        flush: '',
        usagevol: '',
        aveperson: '',
        lat: 0.0,
        long: 0.0,
        catchmentShow: false,
        catchment: '',
        hr_size: '',
        hr_downpipe: '',
        rt_width: '',
        rt_depth: '',
        rt_downpipe_width: '',
        rt_downpipe_depth: '',
        gutterShow: false,
        gutterType: '',
        fflenght: '',
        ffShow: false,
        demandShow: false,
        tankSize: 1,
        topupShow: false,
        height_sqr: '',
        topping_sqr: '',
        height_cyl: '',
        topping_cyl: '',
        tank_type: '',
        menu_type: '',
        pumppow: '',
        pumpShow: false,
        info: '',
        coords: [],
        range: [],
        rr_coef: [],
        rr_st: [],
        token: localStorage.getItem('access_token') || null,
        stations: []
    },
    getters: {
        currentPos(state) {
            var data = [state.lat, state.long]
            return data
        },
        isLoggedIn(state) {
            return state.token != null
        }
    },
    mutations: {
        SET_LOCATION(state, payload) {
            state.location = payload
        },
        SET_COEF(state, payload) {
            state.coefficient = payload
        },
        SET_AREA(state, payload) {
            state.area = payload
        },
        SET_AREA_SHOW(state, payload) {
            state.areaShow = payload
        },
        SET_CATCHMENT_SHOW(state, payload) {
            state.catchmentShow = payload
        },
        SET_CATCHMENT(state, payload) {
            state.catchment = payload
        },
        SET_FLUSH(state, payload) {
            state.flush = payload
        },
        SET_DEMAND(state, payload) {
            state.usagevol = payload
        },
        SET_AVG(state, payload) {
            state.aveperson = payload
        },
        SET_LAT(state, payload) {
            state.lat = payload
        },
        SET_LONG(state, payload) {
            state.long = payload
        },
        SET_GUTTER_HR(state, payload) {
            state.hr_size = payload
        },
        SET_GUTTER_DOWNPIPE_HR(state, payload) {
            state.hr_downpipe = payload
        },
        SET_GUTTER_RTW(state, payload) {
            state.rt_width = payload
        },
        SET_GUTTER_RTD(state, payload) {
            state.rt_depth = payload
        },
        SET_GUTTER_DOWNPIPE_RTW(state, payload) {
            state.rt_downpipe_width = payload
        },
        SET_GUTTER_DOWNPIPE_RTD(state, payload) {
            state.rt_downpipe_depth = payload
        },
        SET_GUTTER_SHOW(state, payload) {
            state.gutterShow = payload
        },
        SET_GUTTER_TYPE(state, payload) {
            state.gutterType = payload
        },
        SET_FF_LENGHT(state, payload) {
            state.fflenght = payload
        },
        SET_FF_SHOW(state, payload) {
            state.ffShow = payload
        },
        SET_DEMAND_SHOW(state, payload) {
            state.demandShow = payload
        },
        SET_TANKSIZE(state, payload) {
            state.tankSize = payload
        },
        SET_TOPUP_SHOW(state, payload) {
            state.topupShow = payload
        },
        SET_SQUARE_HEIGHT(state, payload) {
            state.height_sqr = payload
        },
        SET_SQUARE_TOPPING(state, payload) {
            state.topping_sqr = payload
        },
        SET_CYLINDER_HEIGHT(state, payload) {
            state.height_cyl = payload
        },
        SET_CYLINDER_TOPPING(state, payload) {
            state.topping_cyl = payload
        },
        SET_TANK_TYPE(state, payload) {
            state.tank_type = payload
        },
        MENU_TYPE(state, payload) {
            state.menu_type = payload
        },
        SET_PUMP_POWER(state, payload) {
            state.pumppow = payload
        },
        SET_PUMP_SHOW(state, payload) {
            state.pumpShow = payload
        },
        SET_INFO(state, payload) {
            state.info = payload
        },
        SET_COORDS(state, payload) {
            state.coords = payload
        },
        SET_RANGE(state, payload) {
            state.range = payload
        },
        SET_RR_COEF(state, payload) {
            state.rr_coef = payload
        },
        SET_RR_ST(state, payload) {
            state.rr_st = payload
        },
        SET_TOKEN(state, payload) {
            state.token = payload
        },
        REMOVE_TOKEN(state, payload) {
            state.token = null
        },
        SET_STATIONS(state, payload) {
            state.stations = payload
        }
    },
    actions: {
        get_info({
            state,
            commit
        }) {
            axios
                .get(state.url + '/api/average', {
                    params: {
                        location: state.location
                    }

                })
                .then(response => {
                    commit('SET_INFO', response.data)
                    console.log(response.data)
                })
                .catch(e => {
                    console.log(e)
                })
        },
        get_all_latlong({
            state,
            commit
        }, payload) {
            axios
                .get(state.url + '/api/coords')
                .then(response => {
                    commit('SET_COORDS', response.data)
                })
                .catch(e => {
                    console.log(e)
                })
        },
        simulation({ state }, payload) {
            axios
                .post(state.url + '/api/simulation', payload)
                .then(data => {
                    console.log(data.data)
                })
                .catch(e => {
                    console.log(e)
                })
        },
        get_all_locations({ state, commit }, payload) {
            axios
                .get(state.url + "/api/locations")
                .then(response => {
                    commit('SET_STATIONS', response.data);
                })
                .catch(e => {
                    console.log(e);
                });
        },
        station_upload({ state, commit }, payload) {
            return new Promise((resolve, reject) => {
                axios
                    .post(state.url + '/api/station', payload)
                    .then(response => {
                        console.log(response.data)
                        resolve(response)
                    })
                    .catch(e => {
                        console.log(e)
                        reject(e)
                    })
            })
        },
        rain_upload({ state, commit }, payload) {
            return new Promise((resolve, reject) => {
                axios
                    .post(state.url + '/api/rain', payload)
                    .then(response => {
                        console.log(response.data)
                        resolve(response)
                    })
                    .catch(e => {
                        console.log(e)
                        reject(e)
                    })
            })
        },
        login({
            state,
            commit
        }, payload) {
            return new Promise((resolve, reject) => {
                axios
                    .post(state.url + '/oauth/token', {
                        grant_type: 'password',
                        client_id: 2,
                        client_secret: 'fPVuYp7QbO6xRPNRxVkek37KagrhrESGSpHOJT6v',
                        // client_secret: process.env.MIX_CLIENT_SECRET,
                        username: payload.username,
                        password: payload.password
                    })
                    .then(response => {
                        localStorage.setItem('access_token', response.data.access_token)
                        commit('SET_TOKEN', response.data.access_token)
                        resolve(response)
                    })
                    .catch(e => {
                        console.log(e)
                        reject(e)
                    })
            })
        },
        logout({
            state,
            commit
        }) {
            // axios.defaults.headers.common['Authorization'] = 'Bearer ' + state.token;
            return new Promise((resolve, reject) => {
                axios
                    .post(state.url + '/api/logout')
                    .then(response => {
                        localStorage.removeItem('access_token')
                        commit('REMOVE_TOKEN')
                        resolve(response)
                    })
                    .catch(e => {
                        console.log(e)
                        reject(e)
                    })
            })
        }
        // fPVuYp7QbO6xRPNRxVkek37KagrhrESGSpHOJT6v
    }
});
