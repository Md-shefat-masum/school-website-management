

export default [
    {
        name: 'title',
        label: '',
        type: 'text',
    },
    {
        name: 'link',
        label: '',
        type: 'text',
    },
    {
        name: 'email',
        label: '',
        type: 'email',
    },
    {
        name: 'address',
        label: '',
        type: 'textarea',
    },
    {
        name: 'file',
        label: 'upload your image',
        type: 'file',
        multiple: false,
    },
    {
        name: 'division',
        label: 'select your devision',
        type: 'checkbox',
        data_list: [
            {
                label: 'cse department',
                value: 'cse',
            },
            {
                label: 'bba department',
                value: 'bba',
            },
        ],
    },
    {
        name: 'gender',
        label: 'select your gender',
        type: 'radio',
        data_list: [
            {
                label: 'male',
                value: 'male',
            },
            {
                label: 'female',
                value: 'female',
            },
        ],
    },
    {
        name: 'status',
        label: 'select default status',
        type: 'select',
        multiple: false,
        data_list: [
            {
                label: 'active',
                value: '1',
            },
            {
                label: 'deactive',
                value: '0',
            },
        ],
    },
];
