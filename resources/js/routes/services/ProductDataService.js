import Http from '../http-common'

let routeLink  = 'products';

class ProductDataService {


    getAll() {
        return Http.get(`${routeLink}`);
    }
}

export default new ProductDataService();
