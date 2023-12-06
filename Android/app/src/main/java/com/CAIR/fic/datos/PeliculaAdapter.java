package com.CAIR.fic.datos;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;

import com.CAIR.fic.R;

import java.util.List;

public class PeliculaAdapter extends RecyclerView.Adapter<PeliculaAdapter.PeliculaViewHolder> {

    private List<Pelicula> ListaPeliculas;
    private Context context;
    private OnItemClickListener Listener;

    public interface OnItemClickListener {
        void onItemClick(Pelicula pelicula);
    }

    public PeliculaAdapter(List<Pelicula> listaPeliculas, OnItemClickListener listener) {
        this.ListaPeliculas = listaPeliculas;
        this.Listener = listener;
    }

    @NonNull
    @Override
    public PeliculaViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        Context context = parent.getContext();
        LayoutInflater inflater = LayoutInflater.from(context);
        View view = inflater.inflate(R.layout.item_movie, parent, false);
        return new PeliculaViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull PeliculaViewHolder holder, int position) {
        Pelicula pelicula = ListaPeliculas.get(position);

        Glide.with(holder.itemView.getContext())
                .load(pelicula.getPoster_Pelicula())
                .into(holder.ivMovie);

        holder.itemView.setOnClickListener(v -> Listener.onItemClick(pelicula));
    }

    @Override
    public int getItemCount() {
        return ListaPeliculas.size();
    }

    static class PeliculaViewHolder extends RecyclerView.ViewHolder {
        ImageView ivMovie;

        PeliculaViewHolder(@NonNull View itemView) {
            super(itemView);
            ivMovie = itemView.findViewById(R.id.ivMovie);
        }
    }
}
