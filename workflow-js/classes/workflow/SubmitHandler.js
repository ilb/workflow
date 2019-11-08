import { useState } from 'react';

export default function useSubmitHandler (handler) {
  const [{ loading, error, response }, setSubmitState] = useState({ loading: false, error: null, response: null });

  const submitHandler = async (...args) => {
    setSubmitState({ loading: true });
    const result = await handler(...args);
    if (result.error) {
      setSubmitState({ loading: false, error: result.error });
    } else {
      setSubmitState({ loading: false, response: result.response });
    }
    return result;
  };

  return { loading, error, response, submitHandler };
}
