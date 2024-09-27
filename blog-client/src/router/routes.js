const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/IndexPage.vue") }],
  },
  {
    path: "/dashboard",
    component: () => import("layouts/AdminLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/DashBoard.vue"), // Update to your dashboard component
      },
    ],
  },
  {
    path: "/dashboard/blog",
    component: () => import("layouts/AdminLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/BlogView.vue"),
      },
    ],
  },

  {
    path: "/blog/:id",
    component: () => import("layouts/AdminLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/DetailBlog.vue"),
      },
    ],
  },

  {
    path: "/dashboard/blog/create",
    component: () => import("layouts/AdminLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/CreateView.vue"),
      },
    ],
  },
  {
    path: "/dashboard/blog/edit/:id",
    component: () => import("layouts/AdminLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/EditView.vue"),
      },
    ],
  },
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
