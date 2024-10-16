# Useful Links
## Inertia vue router options
- [Documentation](https://inertiajs.com/manual-visits)
```javascript
router.visit(url, {
  method: 'get',
  data: {},
  replace: false,
  preserveState: false,
  preserveScroll: false,
  only: [],
  headers: {},
  errorBag: null,
  forceFormData: false,
  onCancelToken: cancelToken => {},
  onCancel: () => {},
  onBefore: visit => {},
  onStart: visit => {},
  onProgress: progress => {},
  onSuccess: page => {},
  onError: errors => {},
  onFinish: visit => {},
})
```
### `preserveState`
By default, page visits to the same page create a fresh page component instance. This causes any local state, such as form inputs, scroll positions, and focus states to be lost.

Post, put, patch, delete, and reload methods all set the `preserveState` option to `true` by default. But you have to manually set it for get method.
### `preserveScroll`
When navigating between pages, Inertia mimics default browser behavior by automatically resetting the scroll position of the document body (as well as any scroll regions you've defined) back to the top of the page.

You can disable this behavior by setting the preserveScroll option to true.
