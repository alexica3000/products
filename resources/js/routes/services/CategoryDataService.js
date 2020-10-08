import Http from '../http-common'

class CategoryDataService {
    getAll() {
        return Http.get('/category');
    }
}

export default new CategoryDataService();
