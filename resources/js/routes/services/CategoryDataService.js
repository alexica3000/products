import Http from '../http-common'

class CategoryDataService {
    getAll(category_id = null) {
        return Http.get('/categories', {params: {p_id: category_id}});
    }

    create(data) {
        return Http.post('/categories', data);
    }

    delete(id) {
        return Http.delete(`/categories/${id}`);
    }

    get(id) {
        return Http.get(`/categories/${id}`);
    }

    update(id, data) {
        return Http.put(`/categories/${id}`, data);
    }
}

export default new CategoryDataService();
