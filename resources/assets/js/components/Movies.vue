<template>
  <div>
    <md-card md-with-hover v-for="movie in movies" v-bind:key="movie.id">
      <div>
        <div>{{ movie.photos[0].threezerozero}}</div>
      </div>

      <md-ripple>
        <md-card-header>
          <div class="md-title">{{ movie.title}}</div>
          <div class="md-subhead">{{ movie.movie_description }}</div>
        </md-card-header>

        <md-card-content>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio itaque ea, nostrum odio. Dolores, sed accusantium quasi non.
        </md-card-content>

        <md-card-actions v-for="trailer in movie.trailers"
                         v-bind:key="movie.id">
          <md-button>{{ trailer.name }}</md-button>
          <md-button>{{ trailer.url }}</md-button>
        </md-card-actions>
      </md-ripple>
    </md-card>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchmovies(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchmovies(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>


  </div>
</template>
<style lang="scss" scoped>
  .md-card {
    width: 320px;
    margin: 4px;
    display: inline-block;
    vertical-align: top;
  }
</style>


<script>
export default {
  data() {
    return {
      movies: [],
      movie: {
        id: '',
        title: '',
        movie_description: '',
        runing_time: '',
        release_date: '',
         movie_actor: '',
        movie_review: '',
      },
      movie_id: '',
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchmovies();
  },
  methods: {
    fetchmovies(page_url) {
      let vm = this;
      page_url = page_url || '/api/movies';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.movies = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    deletemovie(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/movie/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('movie Removed');
            this.fetchmovies();
          })
          .catch(err => console.log(err));
      }
    },
    addmovie() {
      if (this.edit === false) {
        // Add
        fetch('api/movie', {
          method: 'post',
          movie_description: JSON.stringify(this.movie),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.movie.title = '';
            this.movie.movie_description = '';
            alert('movie Added');
            this.fetchmovies();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/movie', {
          method: 'put',
          movie_description: JSON.stringify(this.movie),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.movie.title = '';
            this.movie.movie_description = '';
            alert('movie Updated');
            this.fetchmovies();
          })
          .catch(err => console.log(err));
      }
    },
    editmovie(movie) {
      this.edit = true;
      this.movie.id = movie.id;
      this.movie.movie_id = movie.id;
      this.movie.title = movie.title;
      this.movie.movie_description = movie.movie_description;
    }
  }
};
</script>
