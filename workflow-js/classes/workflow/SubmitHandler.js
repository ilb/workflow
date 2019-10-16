import { useState } from 'react';

export default function useSubmitHandler (handler) {
  const [{ loading, error, response }, setSubmitState] = useState({ loading: false, error: null, response: null });

  const submitHandler = async (...args) => {
    setSubmitState({ loading: true });
    const result = await handler(...args);
    if (result.error || !result.response) {
      setSubmitState({ loading: false, error: result.error || 'Нет данных' });
    } else {
      setSubmitState({ loading: false, response: result.response });
    }
    return result;
  };

  return { loading, error, response, submitHandler };
}
