import Http from '../http-common'

class ProductDataService {
    getAll() {
        return Http.get('/product');
    }
}

export default new ProductDataService();
