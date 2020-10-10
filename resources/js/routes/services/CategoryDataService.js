import Http from '../http-common'

class CategoryDataService {
    getAll() {
        return Http.get('/category');
    }

    create(data) {
        return Http.post("/category", data);
    }
}

export default new CategoryDataService();
