function post(path, points, method='get') {
    const form = document.createElement('form');
    form.method = method;
    form.action = path;
    form.target = "test";
  

        const hiddenField = document.createElement('input');
        hiddenField.type = 'number';
        hiddenField.name = "Points";
        hiddenField.value = points;
  
        form.appendChild(hiddenField);
  
    document.body.appendChild(form);
    form.submit();
    form.remove();
  }