 $("#utilisateur").bootstrapTable({
        columns: [{
             
                field: "id",
                title: "Id",
                sortable: true,
                align: "center"
            },
             {
                field: "nom",
                title: "Nom",
                align: "center"
            }
             ,
             {
                field: "prenom",
                title: "Prenom",
                align: "center"
            }
            ,
             {
                field: "email",
                title: "email",
                align: "center"
            },
             {
                field: "mdp",
                title: "Mot de passe",
                align: "center"
            }
           
        ],
       
        detailView: true,
        detailFormatter: detailsFormatter,
        search: true,
        toggle: "table",
        toolbar: "#toolbar",
        pagination: true,
        pageSize: 5,
        pageList: [5, 10, 25, 50, "ALL"]

    });