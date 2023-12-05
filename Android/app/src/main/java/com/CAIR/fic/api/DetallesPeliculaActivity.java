package com.CAIR.fic.api;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import com.CAIR.fic.R;
import com.CAIR.fic.datos.Pelicula;
import com.bumptech.glide.Glide;
import com.google.android.material.bottomsheet.BottomSheetDialogFragment;
import android.widget.ImageView;
import android.widget.TextView;

public class DetallesPeliculaActivity extends BottomSheetDialogFragment {
    public static final String TAG = "DetallesPeliculaActivity";
    private TextView tvTitulo;
    private TextView tvDescripcion;
    private TextView tvCategoria;
    private TextView tvDirector;
    private Button btnReproducir;
    private ImageView ivBanner;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_detalles_pelicula, container, false);

        tvTitulo = view.findViewById(R.id.tvTitulo);
        tvDescripcion = view.findViewById(R.id.tvDescripcion);
        tvCategoria = view.findViewById(R.id.tvCategoria);
        tvDirector = view.findViewById(R.id.tvDirector);
        btnReproducir = view.findViewById(R.id.btnReproducir);
        ivBanner = view.findViewById(R.id.ivBanner);


        // Obtener la información de la película del argumento
        Bundle bundle = getArguments();
        if (bundle != null) {
            Pelicula pelicula = (Pelicula) bundle.getSerializable("pelicula");
            if (pelicula != null) {
                // Configurar la información en los elementos de la interfaz
                tvTitulo.setText(pelicula.getTitulo());
                tvDescripcion.setText(pelicula.getDescripcion());
                tvCategoria.setText("Categoria: " + pelicula.getID_Categoria());
                tvDirector.setText("Director: "+ pelicula.getDirector());

                // Puedes usar Glide o cualquier biblioteca de carga de imágenes para cargar el banner
                Glide.with(requireContext())
                        .load(pelicula.getBanner_Pelicula())
                        .into(ivBanner);

                // Configurar el clic del botón reproducir si es necesario
                btnReproducir.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        // Agrega lógica para reproducir la película
                    }
                });
            }
        }

        return view;
    }
}