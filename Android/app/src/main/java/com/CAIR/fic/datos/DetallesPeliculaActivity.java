package com.CAIR.fic.datos;

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

import com.bumptech.glide.Glide;

import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

public class DetallesPeliculaActivity extends BottomSheetDialogFragment {
    public static final String TAG = "DetallesPeliculaActivity";
    private TextView TvDescripcion;
    private TextView TvCategoria;
    private TextView TvDirector;
    private Button BtnReproducir;
    private ImageView IvBanner;


    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_detalles_pelicula, container, false);

        TextView tvTitulo = view.findViewById(R.id.tvTitulo);
        TvDescripcion = view.findViewById(R.id.tvDescripcion);
        TvCategoria = view.findViewById(R.id.tvCategoria);
        TvDirector = view.findViewById(R.id.tvDirector);
        BtnReproducir = view.findViewById(R.id.btnReproducir);
        IvBanner = view.findViewById(R.id.ivBanner);

        Bundle bundle = getArguments();
        if (bundle != null) {
            Pelicula pelicula = (Pelicula) bundle.getSerializable("pelicula");
            if (pelicula != null) {
                tvTitulo.setText(pelicula.getTitulo());
                TvDescripcion.setText(pelicula.getDescripcion());
                TvCategoria.setText("Categoria: " + pelicula.getID_Categoria());
                TvDirector.setText("Director: "+ pelicula.getDirector());

                Glide.with(requireContext())
                        .load(pelicula.getBanner_Pelicula())
                        .into(IvBanner);

                // Configurar el clic del botón reproducir si es necesario
                BtnReproducir.setOnClickListener(v -> {
                    // Agrega lógica para reproducir la película
                });
            }
        }

        return view;
    }
}