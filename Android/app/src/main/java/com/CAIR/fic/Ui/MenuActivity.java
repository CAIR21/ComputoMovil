package com.CAIR.fic.Ui;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.CAIR.fic.R;
import com.CAIR.fic.datos.DetallesPeliculaActivity;
import com.CAIR.fic.datos.Pelicula;
import com.CAIR.fic.datos.PeliculaAdapter;
import com.CAIR.fic.api.Conexion;
import com.CAIR.fic.servicio.IPeliculas;
import com.google.android.material.button.MaterialButton;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MenuActivity extends AppCompatActivity implements PeliculaAdapter.OnItemClickListener {
    private RecyclerView RvAccion;
    private RecyclerView RvTerror;
    private RecyclerView RvAnimacion;
    private RecyclerView RvSuspenso;
    private RecyclerView RvDrama;
    private RecyclerView RvComedia;
    private RecyclerView RvMisterio;
    private RecyclerView RvInfantiles;
    private RecyclerView RvAnime;

    private PeliculaAdapter AccionAdapter;
    private PeliculaAdapter TerrorAdapter;
    private PeliculaAdapter AnimacionAdapter;
    private PeliculaAdapter SuspensoAdapter;
    private PeliculaAdapter DramaAdapter;
    private PeliculaAdapter ComediaAdapter;
    private PeliculaAdapter MisterioAdapter;
    private PeliculaAdapter InfantilesAdapter;
    private PeliculaAdapter AnimeAdapter;

    private List<Pelicula> ListaAccion = new ArrayList<>();
    private List<Pelicula> ListaTerror = new ArrayList<>();
    private List<Pelicula> ListaAnimacion = new ArrayList<>();
    private List<Pelicula> ListaSuspenso = new ArrayList<>();
    private List<Pelicula> ListaDrama = new ArrayList<>();
    private List<Pelicula> ListaComedia = new ArrayList<>();
    private List<Pelicula> ListaMisterio = new ArrayList<>();
    private List<Pelicula> ListaInfantiles = new ArrayList<>();
    private List<Pelicula> ListaAnime = new ArrayList<>();

    private MaterialButton btnPlayMovie;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        RvAccion = findViewById(R.id.rvAccion);
        RvTerror = findViewById(R.id.rvTerror);
        RvAnimacion = findViewById(R.id.rvAnimacion);
        RvSuspenso = findViewById(R.id.rvSuspenso);
        RvDrama = findViewById(R.id.rvDrama);
        RvComedia = findViewById(R.id.rvComedia);
        RvMisterio = findViewById(R.id.rvMisterio);
        RvInfantiles = findViewById(R.id.rvInfantiles);
        RvAnime = findViewById(R.id.rvAnime);

        LinearLayoutManager accionLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvAccion.setLayoutManager(accionLayoutManager);

        LinearLayoutManager terrorLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvTerror.setLayoutManager(terrorLayoutManager);

        LinearLayoutManager animacionLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvAnimacion.setLayoutManager(animacionLayoutManager);

        LinearLayoutManager suspensoLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvSuspenso.setLayoutManager(suspensoLayoutManager);

        LinearLayoutManager dramaLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvDrama.setLayoutManager(dramaLayoutManager);

        LinearLayoutManager comediaLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvComedia.setLayoutManager(comediaLayoutManager);

        LinearLayoutManager misterioLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvMisterio.setLayoutManager(misterioLayoutManager);

        LinearLayoutManager infantilesLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvInfantiles.setLayoutManager(infantilesLayoutManager);

        LinearLayoutManager animeLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        RvAnime.setLayoutManager(animeLayoutManager);

        AccionAdapter = new PeliculaAdapter(ListaAccion, this);
        RvAccion.setAdapter(AccionAdapter);

        TerrorAdapter = new PeliculaAdapter(ListaTerror, this);
        RvTerror.setAdapter(TerrorAdapter);

        AnimacionAdapter = new PeliculaAdapter(ListaAnimacion, this);
        RvAnimacion.setAdapter(AnimacionAdapter);

        SuspensoAdapter = new PeliculaAdapter(ListaSuspenso, this);
        RvSuspenso.setAdapter(SuspensoAdapter);

        DramaAdapter = new PeliculaAdapter(ListaDrama, this);
        RvDrama.setAdapter(DramaAdapter);

        ComediaAdapter = new PeliculaAdapter(ListaComedia, this);
        RvComedia.setAdapter(ComediaAdapter);

        MisterioAdapter = new PeliculaAdapter(ListaMisterio, this);
        RvMisterio.setAdapter(MisterioAdapter);

        InfantilesAdapter = new PeliculaAdapter(ListaInfantiles, this);
        RvInfantiles.setAdapter(InfantilesAdapter);

        AnimeAdapter = new PeliculaAdapter(ListaAnime, this);
        RvAnime.setAdapter(AnimeAdapter);

        btnPlayMovie = findViewById(R.id.btnPlayMovie);

        btnPlayMovie.setOnClickListener(v -> {
            String url = "https://ficplus2.000webhostapp.com";
            Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
            startActivity(intent);
        });

        getPosts();
    }

    private void getPosts() {
        Call<List<Pelicula>> call = Conexion.getDatos().create(IPeliculas.class).getPeliculas();
        call.enqueue(new Callback<List<Pelicula>>() {
            @SuppressLint("NotifyDataSetChanged")
            @Override
            public void onResponse(Call<List<Pelicula>> call, Response<List<Pelicula>> response) {
                if (!response.isSuccessful()) {
                    return;
                }
                List<Pelicula> peliculaList = response.body();
                for (Pelicula pelicula : peliculaList) {
                    switch (pelicula.getID_Categoria()) {
                        case "Accion":
                            ListaAccion.add(pelicula);
                            break;
                        case "Terror":
                            ListaTerror.add(pelicula);
                            break;
                        case "Animacion":
                            ListaAnimacion.add(pelicula);
                            break;
                        case "Suspenso":
                            ListaSuspenso.add(pelicula);
                            break;
                        case "Drama":
                            ListaDrama.add(pelicula);
                            break;
                        case "Comedia":
                            ListaComedia.add(pelicula);
                            break;
                        case "Misterio":
                            ListaMisterio.add(pelicula);
                            break;
                        case "Infantiles":
                            ListaInfantiles.add(pelicula);
                            break;
                        case "Anime":
                            ListaAnime.add(pelicula);
                            break;
                    }
                }

                AccionAdapter.notifyDataSetChanged();
                TerrorAdapter.notifyDataSetChanged();
                AnimacionAdapter.notifyDataSetChanged();
                SuspensoAdapter.notifyDataSetChanged();
                DramaAdapter.notifyDataSetChanged();
                ComediaAdapter.notifyDataSetChanged();
                MisterioAdapter.notifyDataSetChanged();
                InfantilesAdapter.notifyDataSetChanged();
                AnimeAdapter.notifyDataSetChanged();
            }

            @Override
            public void onFailure(Call<List<Pelicula>> call, Throwable t) {
            }
        });
    }

    @Override
    public void onItemClick(Pelicula pelicula) {
        mostrarDetalles(pelicula);
    }

    private void mostrarDetalles(Pelicula pelicula) {
        DetallesPeliculaActivity bottomSheet = new DetallesPeliculaActivity();
        Bundle bundle = new Bundle();
        bundle.putSerializable("pelicula", pelicula);
        bottomSheet.setArguments(bundle);
        bottomSheet.show(getSupportFragmentManager(), DetallesPeliculaActivity.TAG);
    }
}
