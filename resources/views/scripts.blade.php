    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        const createProjectButton = document.querySelector('#create');
        const createProjectForm = document.querySelector('#create-project-form');
        const taskInputs = document.querySelector('#tasks');
        const addTaskButton = document.querySelector('#add-task');

        createProjectButton.addEventListener('click', createProject);
        addTaskButton.addEventListener('click', addNewTaskField);

        // Create Project ===============================================================

        async function createProject (){
            let tasks = taskInputs.querySelectorAll('input');
            tasks=[...tasks].map(task=>task.value);
            const projectTitle = createProjectForm.querySelector('input').value;
            const projectDescription = createProjectForm.querySelector('textarea').value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Post request
            fetch('/projects', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify({
                    title: projectTitle,
                    description: projectDescription,
                    tasks: tasks
                })
            })
                .then(response => {
                    return response.json();
                })
            .then(data=>{
                window.location.href = data.redirectTo;
            });
        };


        // Add new Field for task ===========================================================

        function addNewTaskField (){
            const div = document.createElement('div');
            div.classList.add('form-group');
            div.classList.add('mb-2');

            const input = document.createElement('input');
            input.classList.add('form-control');
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'body');
            input.setAttribute('placeholder', 'New task');
            input.setAttribute('required', '');

            div.appendChild(input);

            taskInputs.appendChild(div);
        };
    </script>
