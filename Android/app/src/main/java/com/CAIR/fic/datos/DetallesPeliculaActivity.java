package com.CAIR.fic.datos;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.view.ViewGroup;
import android.widget.Button;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.CAIR.fic.R;

import com.CAIR.fic.Ui.ReproductorActivity;
import com.bumptech.glide.Glide;

import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

public class DetallesPeliculaActivity extends BottomSheetDialogFragment {
    public static final String TAG = "DetallesPeliculaActivity";
    private ImageView IvBanner;
    private TextView TvTitulo;
    private TextView TvDirector;
    private TextView TvDescripcion;
    private TextView TvCategoria;
    private Button BtnReproducir;



    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_detalles_pelicula, container, false);

        TvTitulo = view.findViewById(R.id.tvTitulo);
        TvDescripcion = view.findViewById(R.id.tvDescripcion);
        TvCategoria = view.findViewById(R.id.tvCategoria);
        TvDirector = view.findViewById(R.id.tvDirector);
        BtnReproducir = view.findViewById(R.id.btnReproducir);
        IvBanner = view.findViewById(R.id.ivBanner);

        Bundle bundle = getArguments();
        if (bundle != null) {
            Pelicula pelicula = (Pelicula) bundle.getSerializable("pelicula");
            if (pelicula != null) {
                TvTitulo.setText(pelicula.getTitulo());
                TvDescripcion.setText(pelicula.getDescripcion());
                TvCategoria.setText("Categoria: " + pelicula.getID_Categoria());
                TvDirector.setText("Director: "+ pelicula.getDirector());

                Glide.with(requireContext())
                        .load(pelicula.getBanner_Pelicula())
                        .into(IvBanner);

                BtnReproducir.setOnClickListener(v -> {
                    Intent intent = new Intent(requireContext(), ReproductorActivity.class);
                    intent.putExtra("urlPelicula", pelicula.getEnlace_Video());
                    startActivity(intent);
                });

            }
        }

        return view;
    }
}