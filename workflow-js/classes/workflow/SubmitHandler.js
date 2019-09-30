import { useState } from 'react';

export default function useSubmitHandler(handler) {
    const [{loading, error}, setSubmitState] = useState({loading: false, error: null});

    const submitHandler = async (data) => {
        if (!data) {
            setSubmitState({loading: false, error: 'нет данных для отправки'});
        }

        setSubmitState({loading: true});
        try {
            const res = await handler(data);
            if (res && (res.statusText !== "OK" || !res.headers)) {
                setSubmitState({loading: false, error: res.status + ' ' + res.statusText});
            } else {
                setSubmitState({loading: false});
                document.location = res.headers['x-location'];
            }
        } catch (e) {
            setSubmitState({loading: false, error: e.status + ' ' + e.message});
        }
    };
    return {loading, error, submitHandler};
}
